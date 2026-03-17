<?php
session_start();
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
    exit;
}
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
        $stmt->execute([$name, $description, $price]);
    } elseif (isset($_POST['delete_product'])) {
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$_POST['product_id']]);
    }
}
$products = $pdo->query("SELECT * FROM products")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <h2>Admin Dashboard</h2>
    <h3>Add Product</h3>
    <form action="admin.php" method="post">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="number" name="price" placeholder="Price" required>
        <button type="submit" name="add_product">Add Product</button>
    </form>
    <h3>Delete Product</h3>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product['name']; ?> - 
                <form action="admin.php" method="post" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" name="delete_product">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
