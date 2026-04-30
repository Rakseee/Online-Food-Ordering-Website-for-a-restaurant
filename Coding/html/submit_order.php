<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  try {
    $db = new PDO('sqlite:data.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $item = $_POST['food_item'];
    $qty = $_POST['quantity'];

    $stmt = $db->prepare("INSERT INTO orders (name, contact, food_item, quantity) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $contact, $item, $qty]);

    echo "Order submitted! <a href='order1.html'>Go back</a>";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>
