<?php
require_once __DIR__ . '/../components/db_connection.php';

$stmt = $pdo->query("SELECT id, fullname, email FROM users WHERE is_verified = 1 AND is_approved = 0");
$pendingUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Pending Approvals</h2>
<?php if (count($pendingUsers) > 0): ?>
    <table border="1" cellpadding="8">
        <tr><th>Name</th><th>Email</th><th>Action</th></tr>
        <?php foreach ($pendingUsers as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['fullname']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
                <form method="POST" action="../login/approve_user_handler.php" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <button type="submit">Approve</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No users awaiting approval.</p>
<?php endif; ?>
