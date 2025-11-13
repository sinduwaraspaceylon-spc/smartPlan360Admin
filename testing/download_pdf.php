<?php
require_once __DIR__ . '/../components/db_connection.php';
require_once __DIR__ . '/../vendor/autoload.php';

$pdf = new \TCPDF();

// Extend TCPDF to add watermark on every page
class WatermarkedPDF extends TCPDF {
    public function Header() {
        // Set transparency
        $this->SetAlpha(0.1);
        $this->SetFont('helvetica', 'B', 45);
        $this->SetTextColor(160, 160, 160);
        $this->StartTransform();
        $this->Rotate(45, 60, 190);
        $this->Text(35, 130, 'Smart Plan 360');
        $this->StopTransform();
        $this->SetAlpha(1); // reset opacity
    }
}

try {
    $year = isset($_GET['year']) ? intval($_GET['year']) : date("Y");
    $period = isset($_GET['period']) ? intval($_GET['period']) : 6;
    $statusFilter = isset($_GET['status']) ? trim($_GET['status']) : '';

    // Fetch table data (skip NULL or zero)
    $stmt = $pdo->prepare("
        SELECT month, sales, forecast, target, balance, status
        FROM sales_data
        WHERE year = :year
          AND sales IS NOT NULL
          AND forecast IS NOT NULL
          AND forecast != 0
        ORDER BY month DESC
        LIMIT :period
    ");
    $stmt->bindValue(':year', $year, PDO::PARAM_INT);
    $stmt->bindValue(':period', $period, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Sort ascending by month
    usort($data, fn($a, $b) => $a['month'] - $b['month']);

    // Create new PDF
    $pdf = new WatermarkedPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator('Smart Plan 360');
    $pdf->SetAuthor('Smart Plan 360');
    $pdf->SetTitle("Monthly Sales & Forecast Report - {$year}");
    $pdf->SetMargins(15, 20, 15);
    $pdf->AddPage();

    // PDF Header (title)
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, "Smart Plan 360", 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 7, "Monthly Sales & Forecast Report - {$year}", 0, 1, 'C');

    // Build table HTML
    $html = '<table border="1" cellpadding="4">
        <thead style="background-color:#f2f2f2;">
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
        if ($statusFilter && strtolower($row['status']) !== strtolower($statusFilter)) continue;

        $monthName = date("F", mktime(0, 0, 0, $row['month'], 1));
        $sales = number_format((float)$row['sales'], 0);
        $forecast = number_format((float)$row['forecast'], 0);
        $target = number_format((float)$row['target'], 0) . '%';
        $balance = ($row['balance'] >= 0 ? '+' : '') . number_format((float)$row['balance'], 0) . '%';
        $status = $row['status'];

        $html .= "<tr>
            <td>{$monthName}</td>
            <td>{$sales}</td>
            <td>{$forecast}</td>
            <td>{$target}</td>
            <td>{$balance}</td>
            <td>{$status}</td>
        </tr>";
    }

    $html .= '</tbody></table>';

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Ln(5);

    // Footer - generated date
    $pdf->SetFont('helvetica', 'I', 10);
    $pdf->Cell(0, 10, 'Created on: ' . date("F j, Y"), 0, 1, 'R');

    // Output PDF
    $pdf->Output("Monthly_Sales_Forecast_Report_{$year}.pdf", 'I');

} catch (Exception $e) {
    echo "Error generating PDF: " . $e->getMessage();
}
?>
