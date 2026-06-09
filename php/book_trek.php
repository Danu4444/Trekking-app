<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "mt_kinetics";
require 'db.php'; // correct path if book_trek.php is in php folder and db.php also in same folder

$conn = new mysqli($host, $user, $pass, $db, 3307);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trek_name = $_POST['trek_name'] ?? '';
    $trek_code = $_POST['trek_code'] ?? '';
    $email = $_POST['email'] ?? '';
    $num_participants = $_POST['num_participants'] ?? 1;
    $comments = $_POST['comments'] ?? '';

    // Optional: Validate email exists in users table
    $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        echo "User not found. Please register or check your email.";
        exit();
    }

    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, trek_name, trek_code, num_participants, comments, status, booking_date) 
                           VALUES (?, ?, ?, ?, ?, 'Pending', NOW())");

    if ($stmt->execute([$user['user_id'], $trek_name, $trek_code, $num_participants, $comments])) {
        header("Location: ../user/cancel_booking.html");
        exit();
    } else {
        echo "Failed to book trek. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
