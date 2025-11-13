<?php
// save_sales_sources.php
header('Content-Type: application/json');

require_once __DIR__ . '/../components/db_connection.php'; // adjust path

try {
    // Read JSON body
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, true);

    if (!$input) throw new Exception('Invalid JSON payload');

    $year = isset($input['year']) ? (int)$input['year'] : null;
    $month = isset($input['month']) ? (int)$input['month'] : null;
    $rows = isset($input['rows']) && is_array($input['rows']) ? $input['rows'] : [];

    if (!$year || !$month || empty($rows)) {
        echo json_encode(['success'=>false, 'message'=>'Missing year, month, or source rows.']);
        exit;
    }

    // Start transaction
    $pdo->beginTransaction();

    // 1) Find or create sales_data row for the year+month
    $findStmt = $pdo->prepare("SELECT id FROM sales_data WHERE year = :year AND month = :month LIMIT 1");
    $findStmt->execute([':year'=>$year, ':month'=>$month]);
    $salesRow = $findStmt->fetch(PDO::FETCH_ASSOC);

    if ($salesRow) {
        $sales_id = (int)$salesRow['id'];
    } else {
        // create a new row; initial sales = 0 (will update later)
        $insertStmt = $pdo->prepare("INSERT INTO sales_data (year, month, sales, forecast, target, balance, status) VALUES (:year, :month, 0, 0, 0, 0, '')");
        $insertStmt->execute([':year'=>$year, ':month'=>$month]);
        $sales_id = (int)$pdo->lastInsertId();
    }

    // 2) Insert each source row into sales_sources
    $insertSource = $pdo->prepare("INSERT INTO sales_sources (sales_id, source_name, amount) VALUES (:sales_id, :source_name, :amount)");

    $totalAdded = 0.0;
    foreach ($rows as $r) {
        $source = isset($r['source']) ? trim($r['source']) : '';
        $amount = isset($r['amount']) ? (float)$r['amount'] : 0.0;
        if ($source === '' && $amount <= 0) continue;
        // Insert
        $insertSource->execute([
            ':sales_id' => $sales_id,
            ':source_name' => $source,
            ':amount' => $amount
        ]);
        $totalAdded += $amount;
    }

    // 3) Recalculate total for sales_id and update sales_data.sales
    $sumStmt = $pdo->prepare("SELECT COALESCE(SUM(amount),0) as total FROM sales_sources WHERE sales_id = :sales_id");
    $sumStmt->execute([':sales_id' => $sales_id]);
    $sumRow = $sumStmt->fetch(PDO::FETCH_ASSOC);
    $total = isset($sumRow['total']) ? (float)$sumRow['total'] : 0.0;

    $updateStmt = $pdo->prepare("UPDATE sales_data SET sales = :total WHERE id = :id");
    $updateStmt->execute([':total' => $total, ':id' => $sales_id]);

    $pdo->commit();

    echo json_encode(['success' => true, 'sales_id' => $sales_id, 'total' => $total]);

} catch (Exception $e) {
    if ($pdo && $pdo->inTransaction()) $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['success'=>false, 'message'=>$e->getMessage()]);
}
