<?php
require_once "db.php"; // This sets up $pdo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    // Check if email exists
    $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update password
        $update = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
        if ($update->execute([$hashed_password, $email])) {
            echo "<script>alert('Password reset successfully.'); window.location.href='../login.html';</script>";
        } else {
            echo "<script>alert('Error updating password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No user found with that email.'); window.history.back();</script>";
    }
} else {
    header("Location: login.html");
    exit;
}
?>
