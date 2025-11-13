<?php
require_once __DIR__ . '/../components/db_connection.php';
session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (!password_verify($password, $user['password'])) {
                $response['message'] = "Incorrect password!";
            } elseif ($user['is_verified'] == 0) {
                $response['message'] = "Please verify your email before logging in.";
            } elseif ($user['is_approved'] == 0) {
                $response['message'] = "Your account is pending admin approval.";
            } else {
                $_SESSION['user_id'] = $user['id'];
                $response['success'] = true;
                $response['message'] = "Atuntication successful!";
            }
        } else {
            $response['message'] = "Account not found.";
        }
    } catch (PDOException $e) {
        $response['message'] = "Database error: " . $e->getMessage();
    }
}

echo json_encode($response);
?>
