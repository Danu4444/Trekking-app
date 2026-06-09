<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
     $phone    = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password,phone_number) VALUES (?, ?, ?,?)");
    if ($stmt->execute([$name, $email, $password,$phone])) {
        header("Location: ../login.html");
        exit();
    } else {
        echo "Registration failed.";
    }
}
?>
