<?php
session_start();
require 'db.php';

if (isset($_SESSION['user_id'])) {
    // Hash the password before saving
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare and execute the update query
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ?, phone_number = ? WHERE user_id = ?");
    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $hashedPassword,
        $_POST['phone'],
        $_SESSION['user_id']
    ]);

    // Force logout so user can log in with new password
    header("Location: ../logout.php");
    exit();
}
?>
