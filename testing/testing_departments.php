<?php
require_once '../components/db_connection.php';

// Fetch departments
$query = $pdo->query("SELECT id, department_name FROM departments");
    $departments = $query->fetchAll(PDO::FETCH_ASSOC);

// Handle form submit
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $year = $_POST['year'];
    $department_id = $_POST['department_id'];
    $total_sales = $_POST['total_sales'];

    if (!empty($year) && !empty($department_id) && !empty($total_sales)) {
        $stmt = $pdo->prepare("
            INSERT INTO department_sales (department_id, year, total_sales)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE total_sales = VALUES(total_sales)
        ");
        $stmt->execute([$department_id, $year, $total_sales]);
        $message = "✅ Data saved successfully!";
    } else {
        $message = "⚠️ All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Department Sales</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    form { max-width: 400px; background: #f7f7f7; padding: 15px; border-radius: 5px; }
    label { display: block; margin-bottom: 6px; font-weight: bold; }
    input, select { width: 100%; padding: 8px; margin-bottom: 12px; }
    button { padding: 10px; width: 100%; background: #007bff; color: #fff; border: none; cursor: pointer; }
    button:hover { background: #0056b3; }
    .msg { margin-bottom: 10px; font-weight: bold; }
  </style>
</head>
<body>

<h2>Add Department Sales</h2>

<?php if ($message): ?>
  <div class="msg"><?= $message ?></div>
<?php endif; ?>

<form method="POST">
  <label>Select Year</label>
  <select name="year" required>
    <?php for ($y = date("Y") - 5; $y <= date("Y") + 5; $y++): ?>
      <option value="<?= $y ?>"><?= $y ?></option>
    <?php endfor; ?>
  </select>

  <label>Select Department</label>
  <select name="department_id" required>
    <option value="">-- Select Department --</option>
    <?php foreach ($departments as $dept): ?>
      <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['department_name']) ?></option>
    <?php endforeach; ?>
  </select>

  <label>Sales Amount</label>
  <input type="number" step="0.01" name="total_sales" required>

  <button type="submit">Save</button>
</form>

</body>
</html>
