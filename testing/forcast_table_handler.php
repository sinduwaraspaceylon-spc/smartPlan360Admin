<?php
require_once __DIR__ . '/../components/db_connection.php';

try {
    // Get filter values from GET request
    $year = isset($_GET['year']) ? intval($_GET['year']) : date("Y");
    $period = isset($_GET['period']) ? intval($_GET['period']) : 6;
    $statusFilter = isset($_GET['status']) ? trim($_GET['status']) : '';

    // Fetch last N months for the year, skipping NULL sales/forecast
    $period = intval($period);
    $stmt = $pdo->prepare("
        SELECT id, month, sales, forecast, target, balance, status
        FROM sales_data
        WHERE year = :year
          AND sales IS NOT NULL
          AND forecast IS NOT NULL
          AND forecast != 0
        ORDER BY month DESC
        LIMIT $period
    ");
    $stmt->bindValue(':year', $year, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Sort ascending by month
    usort($data, fn($a, $b) => $a['month'] - $b['month']);

    function calculateStatus($targetPercent) {
        if ($targetPercent > 100) return "Exceeded";
        elseif ($targetPercent >= 90 && $targetPercent <= 100) return "On Track";
        elseif ($targetPercent >= 60 && $targetPercent <= 75) return "Below Target";
        elseif ($targetPercent < 60) return "Critical";
        else return "On Track";
    }

    function getStatusClass($status) {
        return match(strtolower($status)) {
            'exceeded' => 'status-excellent',
            'on track' => 'status-good',
            'below target' => 'status-warning',
            'critical' => 'status-critical',
            default => 'status-default',
        };
    }

    echo '<table class="forecast-table">
        <thead>
            <tr>
                <th>Month</th>
                <th>Gross Sale (Rs)</th>
                <th>Forecast (Rs)</th>
                <th>Target</th>
                <th>To Achieve</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($data as $row) {
        // Skip null or zero values
        if ($row['sales'] === null || $row['forecast'] === null || $row['forecast'] == 0) continue;

        $actual = (float)$row['sales'];
        $forecast = (float)$row['forecast'];

        $targetPercent = ($forecast > 0) ? ($actual / $forecast) * 100 : 0;
        $balance = $targetPercent - 100;
        $status = calculateStatus($targetPercent);

        // Apply status filter if selected
        if ($statusFilter && strtolower($status) !== strtolower($statusFilter)) continue;

        // Update DB
        $updateStmt = $pdo->prepare("
            UPDATE sales_data
            SET target = :targetPercent, balance = :balance, status = :status
            WHERE id = :id
        ");
        $updateStmt->execute([
            ':targetPercent' => $targetPercent,
            ':balance' => $balance,
            ':status' => $status,
            ':id' => $row['id']
        ]);

        $monthName = date("F", mktime(0, 0, 0, $row['month'], 1));
        $sales = number_format($actual, 0);
        $forecastFormatted = number_format($forecast, 0);
        $targetFormatted = number_format($targetPercent, 0) . '%';
        $balanceSign = ($balance >= 0 ? '+' : '') . number_format($balance, 0) . '%';
        $statusClass = getStatusClass($status);

        echo "<tr>
            <td>{$monthName}</td>
            <td>{$sales}</td>
            <td>{$forecastFormatted}</td>
            <td>{$targetFormatted}</td>
            <td>{$balanceSign}</td>
            <td><span class='status-badge {$statusClass}'>{$status}</span></td>
        </tr>";
    }

    echo '</tbody></table>';

} catch (Exception $e) {
    echo "<tr><td colspan='6'>Error: " . $e->getMessage() . "</td></tr>";
}
?>