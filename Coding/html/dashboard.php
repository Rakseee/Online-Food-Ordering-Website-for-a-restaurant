<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', sans-serif;
}

body {
  background-image: url("Screenshot (64).png");
  color: #333;
  line-height: 1.6;
}
</style>

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "../db.php";
$contacts = $conn->query("SELECT * FROM contact_messages ORDER BY submitted_at DESC");
$orders = $conn->query("SELECT * FROM food_orders ORDER BY submitted_at DESC");
?>

<h2>Welcome,Rakshana[Admin]</h2>
<a href="logout.php">Logout</a>

<h3>Contact Messages</h3>
<table border="1">
<tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>
<?php while($row = $contacts->fetch_assoc()) { ?>
<tr>
  <td><?= $row['name'] ?></td>
  <td><?= $row['email'] ?></td>
  <td><?= $row['message'] ?></td>
  <td><?= $row['submitted_at'] ?></td>
</tr>
<?php } ?>
</table>

<h3>Food Orders</h3>
<table border="1">
<tr><th>Name</th><th>Contact</th><th>Food</th><th>Qty</th><th>Date</th></tr>
<?php while($row = $orders->fetch_assoc()) { ?>
<tr>
  <td><?= $row['customer_name'] ?></td>
  <td><?= $row['contact'] ?></td>
  <td><?= $row['food_item'] ?></td>
  <td><?= $row['quantity'] ?></td>
  <td><?= $row['submitted_at'] ?></td>
</tr>
<?php } ?>
</table>
