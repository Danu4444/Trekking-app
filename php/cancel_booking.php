<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['booking_id'])) {
    header('Location: ../user/cancel_booking.html');
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.html');  // Redirect to login if not logged in
    exit();
}

$booking_id = (int)$_POST['booking_id'];
$user_id = $_SESSION['user_id'];

// Verify booking belongs to logged-in user
$sql = "SELECT booking_id FROM bookings WHERE booking_id = ? AND user_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$booking_id, $user_id]);
$booking = $stmt->fetch();

if (!$booking) {
    // Booking not found or doesn't belong to user
    header('Location: ../user/cancel_booking.html?error=notfound');
    exit();
}

// Delete booking
$sqlDelete = "DELETE FROM bookings WHERE booking_id = ?";
$stmt = $pdo->prepare($sqlDelete);
$stmt->execute([$booking_id]);

header('Location: ../user/cancel_booking.html?success=cancelled');
exit();
