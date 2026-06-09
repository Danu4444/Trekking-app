<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$trek_code = "TREK" . date("YmdHis");

// Handle image upload
$target_dir = "uploads/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}
$image_name = basename($_FILES["image"]["name"]);
$image_path = $target_dir . $trek_code . "_" . $image_name;
move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);

// Get form data
$name = $_POST['name'];
$location = $_POST['location'];
$date = $_POST['date'];
$price = $_POST['price'];
$description = $_POST['description'];

// Insert into database
$sql = "INSERT INTO treks (trek_code, name, location, date, price, description, image_path)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssiss", $trek_code, $name, $location, $date, $price, $description, $image_path);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Trek added successfully with code: <strong>$trek_code</strong>";
} else {
    echo "Failed to add trek.";
}

$stmt->close();
$conn->close();
?>
