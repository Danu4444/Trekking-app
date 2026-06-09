<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $loggedIn = false;

    // Try admin login first (often preferred if admin has higher privileges)
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['role'] = 'admin';
        header("Location: ../admin/index.html");
        $loggedIn = true;
        exit(); // Exit after a successful admin login
    }

    // Only try user login if admin login failed
    if (!$loggedIn) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = 'user';
            header("Location: ../user/index.html");
            $loggedIn = true;
            exit(); // Exit after a successful user login
        }
    }

    // If neither user nor admin login succeeds
    if (!$loggedIn) {
        header("Location: ../error.html");
        exit();
    }
}
?>