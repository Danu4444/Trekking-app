<?php
session_start();
require 'db.php';

if (!isset($_GET['id'])) {
    die("Booking ID missing.");
}

$booking_id = $_GET['id'];

// Cancel the booking
$stmt = $pdo->prepare("UPDATE bookings SET status = 'Cancelled' WHERE booking_id = ?");
$stmt->execute([$booking_id]);

// Redirect based on user/admin
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header("Location: ../admin/bookings/list_bookings.html");
} else {
    header("Location: ../user/cancellation_confirmation.html");
}
exit();
?>
