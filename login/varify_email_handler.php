<?php
require_once __DIR__ . '/../components/db_connection.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = isset($_POST['token']) ? trim($_POST['token']) : '';
    $section_id = isset($_POST['section_id']) ? trim($_POST['section_id']) : '';

    // Validate inputs
    if (empty($token)) {
        $response['message'] = 'Invalid verification token.';
        echo json_encode($response);
        exit;
    }

    if (empty($section_id)) {
        $response['message'] = 'Please select a section.';
        echo json_encode($response);
        exit;
    }

    try {
        // Verify section exists
        $sectionCheck = $pdo->prepare("SELECT section_name FROM sections WHERE id = ?");
        $sectionCheck->execute([$section_id]);
        $selectedSection = $sectionCheck->fetch(PDO::FETCH_ASSOC);

        if (!$selectedSection) {
            $response['message'] = 'Invalid section selected.';
            echo json_encode($response);
            exit;
        }

        // Check if token is valid
        $stmt = $pdo->prepare("SELECT * FROM users WHERE verification_token = ?");
        $stmt->execute([$token]);

        if ($stmt->rowCount() === 0) {
            $response['message'] = 'Invalid or expired verification token.';
            echo json_encode($response);
            exit;
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['is_verified'] == 1) {
            $response['message'] = 'Email already verified.';
            echo json_encode($response);
            exit;
        }

        // Update user verification status and section
        $update = $pdo->prepare("UPDATE users SET is_verified = 1, verification_token = NULL, section_id = ? WHERE verification_token = ?");
        $update->execute([$section_id, $token]);

        $response['success'] = true;
        $response['message'] = 'Email verified successfully! Your section has been set to ' . htmlspecialchars($selectedSection['section_name']) . '. Please wait for admin approval before you can log in.';
        
    } catch (PDOException $e) {
        $response['message'] = 'Database error: ' . htmlspecialchars($e->getMessage());
    }
} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
exit;