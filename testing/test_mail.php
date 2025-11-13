<?php
require_once __DIR__ . '/../components/mail_config.php';

if (sendMail('nisansala.spaceylon@gmail.com', 'Test Email', '<h3>This is a test from XAMPP!</h3>')) {
    echo "✅ Email sent successfully!";
} else {
    echo "❌ Email failed to send. Check your logs.";
}
?>
