<?php
session_start();
require '../php/db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../index.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['booking_id'])) {
    $stmt = $pdo->prepare("UPDATE bookings SET status = 'Approved' WHERE booking_id = ?");
    $stmt->execute([$_POST['booking_id']]);
}

header("Location: view_booking.html");
exit();
?>
