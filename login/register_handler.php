<?php
require_once __DIR__ . '/../components/db_connection.php';
require_once __DIR__ . '/../components/mail_config.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// andle realtime email availability check (GET)
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['email'])) {
    $email = trim($_GET['email']);
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $exists = $stmt->fetchColumn() > 0;

        echo json_encode(['exists' => $exists]);
        exit;
    } catch (PDOException $e) {
        echo json_encode(['exists' => false, 'error' => $e->getMessage()]);
        exit;
    }
}

// 🧾 Handle registration (POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password validation
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $response['success'] = false;
        $response['message'] = "Please use a stronger password!";
        echo json_encode($response);
        exit;
    }

    if ($password !== $confirm_password) {
        $response['message'] = "Passwords do not match!";
        echo json_encode($response);
        exit;
    }

    try {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $response['message'] = "This email is already registered!";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $verificationToken = bin2hex(random_bytes(32));

            $stmt = $pdo->prepare("INSERT INTO users (fullname, email, password, verification_token, is_verified, is_approved)
                                   VALUES (?, ?, ?, ?, 0, 0)");
            $stmt->execute([$fullname, $email, $hashedPassword, $verificationToken]);

            // Send verification email
            $verifyLink = "http://localhost/Spa_Ceylon_Admin/dynamic_content/login/varify_email.php?token=$verificationToken";
            $subject = "Verify your email - Smart Plan 360";
            $body = "
                <h2>Welcome, $fullname!</h2>
                <p>Please verify your email to activate your account:</p>
                <p><a href='$verifyLink'>$verifyLink</a></p>
                <p>This link will expire in 24 hours.</p>
            ";

            if (sendMail($email, $subject, $body)) {
                $response['success'] = true;
                $response['message'] = "Registration successful! Please check your email to verify your account.";
            } else {
                $response['message'] = "Registration successful, but failed to send verification email.";
            }
        }
    } catch (PDOException $e) {
        $response['message'] = "Database error: " . $e->getMessage();
    }
}

echo json_encode($response);
?>
