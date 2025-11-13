<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../components/db_connection.php';

try {
    // Current year & month
    $currentYear = date("Y");
    $currentMonth = date("n");

    // Selected year for department sales (default: current year)
    $selectedYear = isset($_GET['year']) ? (int)$_GET['year'] : $currentYear;

    // Past 6 months actual sales + SMA + exponential
    $previousMonth = $currentMonth - 1;
    $previousYear = $currentYear;
    if ($previousMonth == 0) {
        $previousMonth = 12;
        $previousYear = $currentYear - 1;
    }

    $pastStmt = $pdo->prepare("
        SELECT id, year, month, sales, sma_last3, exponential
        FROM sales_data 
        WHERE (year < :previousYear)
              OR (year = :previousYear AND month <= :previousMonth)
        ORDER BY year DESC, month DESC 
        LIMIT 6
    ");
    $pastStmt->execute([
        ':previousYear' => $previousYear,
        ':previousMonth' => $previousMonth
    ]);
    $pastData = array_reverse($pastStmt->fetchAll(PDO::FETCH_ASSOC));

    $lastSales = end($pastData);
    $lastSalesYear = $lastSales['year'] ?? $previousYear;
    $lastSalesMonth = $lastSales['month'] ?? $previousMonth;

    // Future forecast
    $startForecastMonth = $lastSalesMonth + 1;
    $startForecastYear = $lastSalesYear;
    if ($startForecastMonth > 12) {
        $startForecastMonth = 1;
        $startForecastYear++;
    }

    $futureStmt = $pdo->prepare("
        SELECT year, month, forecast 
        FROM sales_data 
        WHERE (year > :startForecastYear)
              OR (year = :startForecastYear AND month >= :startForecastMonth)
        ORDER BY year ASC, month ASC
    ");
    $futureStmt->execute([
        ':startForecastYear' => $startForecastYear,
        ':startForecastMonth' => $startForecastMonth
    ]);
    $futureData = $futureStmt->fetchAll(PDO::FETCH_ASSOC);

    // Build chart series
    $labels = [];
    $salesSeries = [];
    $forecastSeries = [];
    $smaSeries = [];
    $expSeries = [];

    foreach ($pastData as $row) {
        $labels[] = date("M y", mktime(0, 0, 0, $row['month'], 1, $row['year']));
        $salesSeries[] = (float)$row['sales'];
        $forecastSeries[] = null;
        $smaSeries[] = $row['sma_last3'] !== null ? (float)$row['sma_last3'] : null;
        $expSeries[] = $row['exponential'] !== null ? (float)$row['exponential'] : null;
    }

    foreach ($futureData as $row) {
        $labels[] = date("M y", mktime(0, 0, 0, $row['month'], 1, $row['year']));
        $salesSeries[] = null;
        $forecastSeries[] = (float)$row['forecast'];
        $smaSeries[] = null;
        $expSeries[] = null;
    }

    // Sales sources
    $sourcesLabels = [];
    $outlet = $online = $export = $bia = $hotels = [];

    foreach ($pastData as $row) {
        $sourcesLabels[] = date("M y", mktime(0, 0, 0, $row['month'], 1, $row['year']));

        $sourceStmt = $pdo->prepare("
            SELECT source_name, amount
            FROM sales_sources
            WHERE sales_id = :salesId
        ");
        $sourceStmt->execute([':salesId' => $row['id']]);
        $sources = $sourceStmt->fetchAll(PDO::FETCH_KEY_PAIR);

        $outlet[] = $sources['Outlet'] ?? 0;
        $online[] = $sources['Online'] ?? 0;
        $export[] = $sources['Export'] ?? 0;
        $bia[] = $sources['BIA'] ?? 0;
        $hotels[] = $sources['Hotels'] ?? 0;
    }

    // Department sales (merged first PHP logic)
    $deptStmt = $pdo->query("SELECT id, department_name FROM departments ORDER BY department_name");
    $departments = $deptStmt->fetchAll(PDO::FETCH_ASSOC);

    $deptLabels = [];
    $deptSales = [];

    foreach ($departments as $dept) {
        $deptLabels[] = $dept['department_name'];

        $saleStmt = $pdo->prepare("
            SELECT COALESCE(SUM(total_sales),0) as total 
            FROM department_sales 
            WHERE department_id = :dept_id AND year = :year
        ");
        $saleStmt->execute([
            ':dept_id' => $dept['id'],
            ':year' => $selectedYear
        ]);
        $row = $saleStmt->fetch(PDO::FETCH_ASSOC);
        $deptSales[] = (float)$row['total'];
    }

    // Output JSON
    echo json_encode([
        "labels" => $labels,
        "sales" => $salesSeries,
        "forecast" => $forecastSeries,
        "sma" => $smaSeries,
        "expo" => $expSeries,
        "sources" => [
            "labels" => $sourcesLabels,
            "outlet" => $outlet,
            "online" => $online,
            "export" => $export,
            "bia" => $bia,
            "hotels" => $hotels
        ],
        "departments" => [
            "labels" => $deptLabels,
            "sales" => $deptSales,
            "year" => $selectedYear
        ]
    ]);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
