<?php
require_once __DIR__ . '/../components/db_connection.php';
require_once __DIR__ . '/../components/mail_config.php';

if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    try {
        // Fetch user info
        $stmt = $pdo->prepare("SELECT fullname, email, is_approved FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "<p style='color:red;'>User not found.</p>";
            exit;
        }

        // Check if already approved
        if ($user['is_approved'] == 1) {
            echo "<p style='color:orange;'>User already approved.</p>";
            exit;
        }

        // Approve user
        $update = $pdo->prepare("UPDATE users SET is_approved = 1 WHERE id = ?");
        $update->execute([$userId]);

        // Send approval email
        $to = $user['email'];
        $fullname = htmlspecialchars($user['fullname']);
        $subject = "Your Smart Plan 360 Account Has Been Approved!";
        $body = "
            <h2>Hello, $fullname!</h2>
            <p>Great news! Your Smart Plan 360 account has been <b>approved by our admin team</b>.</p>
            <p>You can now log in and start using your account:</p>
            <p><a href='http://localhost/Spa_Ceylon_Admin/dynamic_content/login/login_form.php' style='background:#007bff;color:white;padding:10px 15px;text-decoration:none;border-radius:4px;'>Login Now</a></p>
            <br>
            <p>Best regards,<br><b>Smart Plan 360 Team</b></p>
        ";

        if (sendMail($to, $subject, $body)) {
            echo "<p style='color:green;'>User approved and email sent successfully!</p>";
        } else {
            echo "<p style='color:orange;'>User approved, but email sending failed.</p>";
        }

        echo "<a href='admin_approval.php'>Back to Admin Panel</a>";

    } catch (PDOException $e) {
        echo "<p style='color:red;'>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
