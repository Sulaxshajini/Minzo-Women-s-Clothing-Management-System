<?php
include 'connection.php';
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Delete the product if 'id' is passed via URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id=$id";
    
    if ($conn->query($query)) {
        echo "Product deleted successfully!";
        header("Location: view_products.php");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    header("Location: view_products.php");
}
?>
