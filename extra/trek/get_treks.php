<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "trek_system";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM treks ORDER BY date ASC");
$treks = [];

while ($row = $result->fetch_assoc()) {
    $treks[] = $row;
}

header('Content-Type: application/json');
echo json_encode($treks);
$conn->close();
?>
