<?php
require_once __DIR__ . '/../components/db_connection.php';

try {
    // Get filter values from GET request
    $rank = isset($_GET['rank']) ? trim($_GET['rank']) : '';
    $year = isset($_GET['year']) ? intval($_GET['year']) : date("Y");
    $month = isset($_GET['month']) ? intval($_GET['month']) : '';

    // Build the SQL query with filters and proper JOINs
    $sql = "
        SELECT 
            p.id,
            p.product_name,
            p.product_code,
            p.unit_price,
            p.total,
            p.rank_position,
            p.demand,
            p.year,
            p.month,
            d.department_name,
            c.category_name,
            r.range_name,
            u.unit_name
        FROM products p
        LEFT JOIN departments d ON p.department_id = d.id
        LEFT JOIN categories c ON p.category_id = c.id
        LEFT JOIN ranges r ON p.range_id = r.id
        LEFT JOIN units_of_measure u ON p.unit_id = u.id
        WHERE p.year = :year
    ";

    // Add month filter if provided
    if ($month !== '') {
        $sql .= " AND p.month = :month";
    }

    // Add rank filter if provided
    if ($rank !== '') {
        if (strtolower($rank) === 'top') {
            $sql .= " AND p.rank_position <= 10";
        } elseif (strtolower($rank) === 'low') {
            $sql .= " AND p.rank_position > 10";
        }
    }

    $sql .= " ORDER BY p.rank_position ASC, p.month ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':year', $year, PDO::PARAM_INT);
    
    if ($month !== '') {
        $stmt->bindValue(':month', $month, PDO::PARAM_INT);
    }

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Helper function to get rank badge class
    function getRankClass($rank) {
        if ($rank <= 3) return 'rank-top';
        elseif ($rank <= 10) return 'rank-high';
        elseif ($rank <= 20) return 'rank-medium';
        else return 'rank-low';
    }

    // Helper function to get demand status
    function getDemandStatus($demand) {
        if ($demand >= 1000) return ['status' => 'Very High', 'class' => 'status-excellent'];
        elseif ($demand >= 500) return ['status' => 'High', 'class' => 'status-good'];
        elseif ($demand >= 100) return ['status' => 'Medium', 'class' => 'status-warning'];
        else return ['status' => 'Low', 'class' => 'status-critical'];
    }

    // Start table output
    echo '<table class="forecast-table demand-table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Prod Code</th>
                <th>Prod Name</th>
                <th>Department</th>
                <th>Category</th>
                <th>Range</th>
                <th>Unit Price (Rs)</th>
                <th>Total (Rs)</th>
                <th>Demand</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>';

    if (count($data) > 0) {
        foreach ($data as $row) {
            $rankClass = getRankClass($row['rank_position']);
            $demandInfo = getDemandStatus($row['demand']);
            
            $unitPrice = number_format($row['unit_price'], 2);
            $total = number_format($row['total'], 2);
            $demand = number_format($row['demand'], 0);
            
            // Display names from joined tables or 'N/A' if not found
            $departmentDisplay = $row['department_name'] ?? 'N/A';
            $categoryDisplay = $row['category_name'] ?? 'N/A';
            $rangeDisplay = $row['range_name'] ?? 'N/A';

            echo "<tr>
                <td><span class='rank-badge {$rankClass}'>#{$row['rank_position']}</span></td>
                <td>{$row['product_code']}</td>
                <td class='product-name'>{$row['product_name']}</td>
                <td>{$departmentDisplay}</td>
                <td>{$categoryDisplay}</td>
                <td>{$rangeDisplay}</td>
                <td>{$unitPrice}</td>
                <td class='total-value'>{$total}</td>
                <td class='demand-value'>{$demand}</td>
                <td><span class='status-badge {$demandInfo['class']}'>{$demandInfo['status']}</span></td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='11' class='no-data'>No demand data found for the selected filters</td></tr>";
    }

    echo '</tbody></table>';

} catch (Exception $e) {
    echo "<div class='error-message'>Error loading demand data: " . htmlspecialchars($e->getMessage()) . "</div>";
}
?>