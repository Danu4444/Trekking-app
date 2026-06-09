<?php
$conn = new mysqli("localhost", "root", "", "mtkinitecs");
if ($conn->connect_error) die("Connection failed");

$username = $_POST['username'];
$email = $_POST['email'];
$trek_code = $_POST['trek_code'];
$booking_date = date("Y-m-d");

$sql = "INSERT INTO bookings (username, email, trek_code, booking_date)
        VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $username, $email, $trek_code, $booking_date);
$stmt->execute();

if ($stmt->affected_rows > 0) {
  echo "<h3>Booking Successful!</h3>";
  echo "Thank you, <b>$username</b>. Your booking for Trek <b>$trek_code</b> has been submitted.<br>";
  echo "We'll contact you at <b>$email</b>.";
} else {
  echo "Booking failed. Try again.";
}

$stmt->close();
$conn->close();
?>
