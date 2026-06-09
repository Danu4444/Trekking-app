<?php
session_start();
require 'db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch bookings for this user_id, and join user info to get name and email
$sql = "
    SELECT b.booking_id, b.trek_name, b.booking_date, u.name AS user_name, u.email AS user_email
    FROM bookings b
    JOIN users u ON b.user_id = u.user_id
    WHERE b.user_id = ?
    ORDER BY b.booking_date DESC
";

$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($bookings);
