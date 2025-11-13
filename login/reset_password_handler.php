<?php
require_once __DIR__ . '/../components/db_connection.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Check if token is provided in URL (GET request for validation)
if (isset($_GET['token']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $token = trim($_GET['token']);

    try {
        // Verify token with UTC timestamp for consistency
        $stmt = $pdo->prepare("SELECT id, email FROM users WHERE reset_token = ? AND token_expiry > UTC_TIMESTAMP()");
        $stmt->execute([$token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $response['success'] = true;
            $response['message'] = "Token is valid. You can reset your password.";
        } else {
            $response['success'] = false;
            $response['message'] = "Invalid or expired token.";
        }
    } catch (PDOException $e) {
        $response['success'] = false;
        $response['message'] = "Database error: " . htmlspecialchars($e->getMessage());
    }

    echo json_encode($response);
    exit;
}

// Handle password reset submission (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = trim($_POST['token'] ?? '');
    $newPassword = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');

    // Validate inputs
    if (empty($token)) {
        $response['message'] = "No token provided.";
        echo json_encode($response);
        exit;
    }

    if (empty($newPassword)) {
        $response['message'] = "Password is required.";
        echo json_encode($response);
        exit;
    }

    if (strlen($newPassword) < 8) {
        $response['message'] = "Password must be at least 8 characters long.";
        echo json_encode($response);
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        $response['message'] = "Passwords do not match.";
        echo json_encode($response);
        exit;
    }

    try {
        // Verify token again
        $stmt = $pdo->prepare("SELECT id, email FROM users WHERE reset_token = ? AND token_expiry > UTC_TIMESTAMP()");
        $stmt->execute([$token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update password and clear reset token
            $update = $pdo->prepare("UPDATE users 
                                     SET password = ?, reset_token = NULL, token_expiry = NULL 
                                     WHERE id = ?");
            $update->execute([$hashedPassword, $user['id']]);

            $response['success'] = true;
            $response['message'] = "Password updated successfully! You can now log in with your new password.";
        } else {
            $response['message'] = "Invalid or expired token. Please request a new password reset.";
        }
    } catch (PDOException $e) {
        $response['message'] = "Database error: " . htmlspecialchars($e->getMessage());
    }

    echo json_encode($response);
    exit;
}

// Invalid request method
$response['message'] = "Invalid request method.";
echo json_encode($response);
?>