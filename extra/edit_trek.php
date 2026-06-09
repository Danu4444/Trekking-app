<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE treks SET name=?, location=?, difficulty=?, date=?, price=?, description=? WHERE trek_id=?");
    $stmt->execute([
        $_POST['name'],
        $_POST['location'],
        $_POST['difficulty'],
        $_POST['date'],
        $_POST['price'],
        $_POST['description'],
        $_POST['trek_id']
    ]);
    header("Location: ../admin/treks/list_treks.html");
}
?>
