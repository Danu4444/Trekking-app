<?php
$conn = new mysqli("localhost", "root", "", "mtkinitecs");
if ($conn->connect_error) die("Connection failed");

$result = $conn->query("
  SELECT b.username, b.email, b.booking_date, t.name AS trek_name, t.trek_code
  FROM bookings b
  JOIN treks t ON b.trek_code = t.trek_code
  ORDER BY b.booking_date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Bookings</title>
  <style>
    body { font-family: Arial; background: #f9f9f9; padding: 20px; }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }
    th {
      background-color: #3498db;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h2>All Trek Bookings</h2>
  <table>
    <tr>
      <th>User</th>
      <th>Email</th>
      <th>Trek</th>
      <th>Trek Code</th>
      <th>Booking Date</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['username'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['trek_name'] ?></td>
        <td><?= $row['trek_code'] ?></td>
        <td><?= $row['booking_date'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
