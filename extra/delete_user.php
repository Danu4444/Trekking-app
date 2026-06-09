<?php
require 'db.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: ../admin/users/list_users.html");
?>
