<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "mt_kinetics";

$conn = new mysqli($host, $user, $pass, $db, 3307);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT trek_code, name, location, date, price, description, image_path FROM treks ");
$treks = [];

while ($row = $result->fetch_assoc()) {
    $treks[] = $row;
}

header('Content-Type: application/json');
echo json_encode($treks);
$conn->close();
?>
