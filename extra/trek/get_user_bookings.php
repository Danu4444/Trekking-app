<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) exit;

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT bookings.*, treks.name FROM bookings 
JOIN treks ON bookings.trek_id = treks.trek_id 
WHERE bookings.user_id = ?");
$stmt->execute([$user_id]);
echo json_encode($stmt->fetchAll());
?>
