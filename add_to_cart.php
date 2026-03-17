<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

$stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + ?");
$stmt->execute([$user_id, $product_id, $quantity, $quantity]);
header('Location: carts.php');
?>
