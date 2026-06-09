<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin_id'])) {
    echo json_encode([]);
    exit();
}

$stmt = $pdo->query("SELECT b.*, u.email FROM bookings b JOIN users u ON b.user_id = u.user_id ORDER BY booking_date DESC");
$bookings = $stmt->fetchAll();

echo json_encode($bookings);
