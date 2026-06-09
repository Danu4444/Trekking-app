
<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Delete bookings first
    $pdo->prepare("DELETE FROM bookings WHERE user_id = ?")->execute([$user_id]);

    // Then delete user
    $pdo->prepare("DELETE FROM users WHERE user_id = ?")->execute([$user_id]);
}

header('Location: ../admin/users/user.html');
exit();
?>
