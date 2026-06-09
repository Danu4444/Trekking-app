<?php
require 'db.php';

$stmt = $pdo->query("SELECT user_id, name, email, phone_number FROM users");
$users = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($users);
?>
