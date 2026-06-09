<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM treks ORDER BY date ASC");
$treks = $stmt->fetchAll();
echo json_encode($treks);
?>
