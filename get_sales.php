<?php
header("Content-Type: application/json");
include 'components/connection.php';
$sql = "SELECT YEAR(sale_date) AS year, SUM(quantity) AS total_quantity 
        FROM sales 
        GROUP BY YEAR(sale_date) 
        ORDER BY year";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
