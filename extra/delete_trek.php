<?php
require 'db.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM treks WHERE trek_id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: ../admin/treks/list_treks.html");
?>
