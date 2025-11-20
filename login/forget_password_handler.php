<?php 
require_once __DIR__ . '/../components/db_connection.php';
require_once __DIR__ . '/../components/mail_config.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    try {
        // Check if email exists
        $stmt = $pdo->prepare("SELECT id, reset_request_count, last_reset_request FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $userId = $user['id'];
            $resetCount = (int)$user['reset_request_count'];
            $lastReset = $user['last_reset_request'] ? new DateTime($user['last_reset_request']) : null;
            $now = new DateTime();

            // Check if last reset was in the same month
            if ($lastReset && $lastReset->format('Y-m') === $now->format('Y-m')) {
                if ($resetCount >= 3) {
                    $response['message'] = "You've reached your password reset limit (3 per month).";
                    echo json_encode($response);
                    exit;
                } else {
                    $resetCount++;
                }
            } else {
                // New month, reset count
                $resetCount = 1;
            }

            // Generate reset token and expiry
            $token = bin2hex(random_bytes(50));
            $update = $pdo->prepare("
                UPDATE users 
                SET reset_token = ?, token_expiry = DATE_ADD(UTC_TIMESTAMP(), INTERVAL 1 HOUR),
                    reset_request_count = ?, last_reset_request = UTC_TIMESTAMP()
                WHERE id = ?
            ");
            $update->execute([$token, $resetCount, $userId]);

            // Send email
            $resetLink = "http://localhost/Spaceylon_admin_pannel/smartPlan360Admin/login/reset_password.php?token=$token";
            $subject = "Password Reset Request - Smart Plan 360";
            $body = "
                <h2>Password Reset Request</h2>
                <p>Click the link below to reset your password. This link will expire in 1 hour.</p>
                <p><a href='$resetLink'>$resetLink</a></p>
            ";

            if (sendMail($email, $subject, $body)) {
                $response['success'] = true;
                $response['message'] = "Reset link sent to your email. You have used $resetCount of 3 this month.";
            } else {
                $response['message'] = "Failed to send reset email. Please try again later.";
            }
        } else {
            $response['message'] = "Email not found.";
        }
    } catch (PDOException $e) {
        $response['message'] = "Database error: " . htmlspecialchars($e->getMessage());
    }
}

echo json_encode($response);
?>
