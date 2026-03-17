<?php
require 'config.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
    $stmt->execute(['%' . $query . '%']);
    $products = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>
<body>
    <h2>Search Results</h2>
    <?php if (!empty($products)): ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><?php echo $product['name'] . ' - $' . $product['price']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
