<?php
require_once __DIR__ . '/../components/db_connection.php';

$token = isset($_GET['token']) ? trim($_GET['token']) : '';
$error = '';
$user = null;
$sections = [];

// Fetch sections from database
try {
    $sectionsStmt = $pdo->query("SELECT id, section_name FROM sections ORDER BY section_name");
    $sections = $sectionsStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = 'Error loading sections.';
}

// Check if token is valid
if ($token) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE verification_token = ?");
        $stmt->execute([$token]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user['is_verified'] == 1) {
                $error = 'Email already verified.';
            }
        } else {
            $error = 'Invalid or expired verification token.';
        }
    } catch (PDOException $e) {
        $error = 'Database error occurred.';
    }
} else {
    $error = 'No verification token provided.';
}
?>

<?php include "../components/CDN.php" ?>
<link rel="stylesheet" href="../css/test.css">
<div class="background">
    <div class="container">
        <div id="verifyEmailForm" class="form-container">
            <h2>Smart Plan 360</h2>
            <p class="subtitle">Complete your email verification</p>

            <div id="verifyEmailMessage" class="form-message" style="display:none;"></div>

            <?php if ($error): ?>
                <div class="form-message error" style="display:block;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
                <div class="back-to-login">
                    <a href="../login/login_form.php">Back to Login</a>
                </div>
            <?php elseif ($user): ?>
                <div class="user-info">
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['fullname']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                </div>

                <form id="verifyEmailFormElement">
                    <input type="hidden" id="verifyToken" name="token" value="<?php echo htmlspecialchars($token); ?>">

                    <div class="input-group">
                        <select name="section_id" id="section_id" required>
                            <option value="" selected disabled>Select Section</option>
                            <?php foreach ($sections as $section): ?>
                                <option value="<?php echo htmlspecialchars($section['id']); ?>">
                                    <?php echo htmlspecialchars($section['section_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <i class="fa-solid fa-building"></i>
                    </div>

                    <button type="submit" class="btn btn-primary">Verify Email</button>
                </form>

                <div class="back-to-login">
                    <a href="../login/login_form.php">Back to Login</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="../js/email_verify.js"></script>