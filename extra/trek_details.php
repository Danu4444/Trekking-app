<?php
require 'db.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM treks WHERE trek_id = ?");
    $stmt->execute([$_GET['id']]);
    echo json_encode($stmt->fetch());
}
?>
