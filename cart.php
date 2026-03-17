<?php
session_start();
require 'config.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT products.*, cart.quantity FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<link rel="stylesheet" href="style.css">
<body>
    <h2>Your Cart</h2>
    <?php if (!empty($cart_items)): ?>
        <ul>
            <?php foreach ($cart_items as $item): ?>
                <li><?php echo $item['name'] . ' - $' . $item['price'] . ' x ' . $item['quantity']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</body>
</html>
