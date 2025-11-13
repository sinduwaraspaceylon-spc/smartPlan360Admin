<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../components/db_connection.php';

$currentYear  = date("Y");
$currentMonth = date("n");

// Month names for display on run
$monthNames = [
    "January","February","March","April","May","June",
    "July","August","September","October","November","December"
];

// Get latest sales with fallback
function getLatestSalesOrFallback($pdo, $year, $month) {
    $stmt = $pdo->prepare("SELECT sales FROM sales_data WHERE year = ? AND month = ? AND sales IS NOT NULL LIMIT 1");
    $stmt->execute([$year, $month]);
    $sales = $stmt->fetchColumn();
    return $sales !== false ? (float)$sales : 0;
}

// Get monthly percentage
function getMonthlyPercentage(PDO $pdo, int $month): ?float {
    $stmt = $pdo->prepare("SELECT percentage FROM percentage WHERE month = ? LIMIT 1");
    $stmt->execute([$month]);
    $result = $stmt->fetchColumn();
    return $result !== false ? (float)$result : null;
}

// Calculate last month's SMA
$lastMonth = $currentMonth - 1;
$lastMonthYear = $currentYear;
if ($lastMonth <= 0) {
    $lastMonth = 12;
    $lastMonthYear--;
}

$salesData = [];
for ($i = 0; $i < 3; $i++) {
    $month = $lastMonth - $i;
    $year  = $lastMonthYear;

    if ($month <= 0) {
        $month += 12;
        $year--;
    }

    $stmt = $pdo->prepare("SELECT sales FROM sales_data WHERE year = ? AND month = ? AND sales IS NOT NULL LIMIT 1");
    $stmt->execute([$year, $month]);
    $sale = $stmt->fetchColumn();

    if ($sale !== false && $sale !== null) {
        $salesData[] = (float)$sale;
    }
}

if (count($salesData) === 3) {
    $sma = array_sum($salesData) / 3;

    $update = $pdo->prepare("UPDATE sales_data SET sma_last3 = ? WHERE year = ? AND month = ?");
    $update->execute([$sma, $lastMonthYear, $lastMonth]);

    echo "✅ SMA calculated for last month ($lastMonthYear-$lastMonth): $sma<br>";
} else {
    echo "⚠️ Not enough sales data to calculate SMA (need 3 months).<br>";
}

// Calculate last month's EMA
$calcMonth = $lastMonth;
$calcYear = $lastMonthYear;

// Previous month for EMA
$prevMonth = $calcMonth - 1;
$prevYear = $calcYear;
if ($prevMonth <= 0) {
    $prevMonth = 12;
    $prevYear--;
}

// Sales for calculating month
$stmt = $pdo->prepare("SELECT sales FROM sales_data WHERE year = ? AND month = ? LIMIT 1");
$stmt->execute([$calcYear, $calcMonth]);
$sales = $stmt->fetchColumn();
$sales = $sales !== false ? (float)$sales : 0;

// Previous EMA
$stmt = $pdo->prepare("SELECT exponential FROM sales_data WHERE year = ? AND month = ? LIMIT 1");
$stmt->execute([$prevYear, $prevMonth]);
$prevEMA = $stmt->fetchColumn();
$prevEMA = $prevEMA !== false ? (float)$prevEMA : 0;

// EMA calculation
$alpha = 0.5;
$ema = ($alpha * $sales) + ((1 - $alpha) * $prevEMA);

// Store EMA
$update = $pdo->prepare("UPDATE sales_data SET exponential = ? WHERE year = ? AND month = ?");
$update->execute([$ema, $calcYear, $calcMonth]);

echo "✅ EMA for $calcYear-$calcMonth: $ema<br>";

// Generate forecast for next 6 months
for ($i = 0; $i < 6; $i++) {
    $forecastMonth = $currentMonth + $i;
    $forecastYear  = $currentYear;

    if ($forecastMonth > 12) {
        $forecastMonth -= 12;
        $forecastYear++;
    }

    $lastYear = $forecastYear - 1;

    $monthlyPercentage = getMonthlyPercentage($pdo, $forecastMonth);
    if ($monthlyPercentage === null) {
        echo "No percentage found for month {$forecastMonth}. Skipping...<br>";
        continue;
    }

    $latestSales = getLatestSalesOrFallback($pdo, $forecastYear, $forecastMonth);

    $stmt = $pdo->prepare("SELECT sales FROM sales_data WHERE year = ? AND month = ? LIMIT 1");
    $stmt->execute([$lastYear, $forecastMonth]);
    $lastYearSales = $stmt->fetchColumn();
    $lastYearSales = $lastYearSales !== false ? (float)$lastYearSales : 0;

    $baseValue = max($latestSales, $lastYearSales);

    if ($baseValue > 0) {
        $forecastValue = $baseValue * $monthlyPercentage;

        $insert = $pdo->prepare("
            INSERT INTO sales_data (year, month, forecast) 
            VALUES (?, ?, ?) 
            ON DUPLICATE KEY UPDATE forecast = VALUES(forecast)
        ");
        $insert->execute([$forecastYear, $forecastMonth, $forecastValue]);

        echo "✅ Forecast for {$monthNames[$forecastMonth - 1]} {$forecastYear}: {$forecastValue}<br>";
    } else {
        echo "⚠️ Skipped {$monthNames[$forecastMonth - 1]} {$forecastYear} — no base data available.<br>";
    }
}

echo "<br><strong>SUCCESS:</strong> SMA, EMA, and Forecast updated!";
