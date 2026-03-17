<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category'];
    $brand_id = $_POST['brand'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Image upload
    $image = $_FILES['image']['name'];
    $target_dir = "../product_images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    $query = "INSERT INTO products (product_name, category_id, brand_id, price, image, description) 
              VALUES ('$product_name', '$category_id', '$brand_id', '$price', '$image', '$description')";

    if ($conn->query($query) === TRUE) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Insert Product</title>
</head>
<body>
    <div class="form-container">
        <h1>Insert New Product</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="product_name" placeholder="Product Name" required>
            <input type="number" name="category" placeholder="Category ID" required>
            <input type="number" name="brand" placeholder="Brand ID" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <input type="file" name="image" required>
            <textarea name="description" placeholder="Product Description" required></textarea>
            <button type="submit">Insert Product</button>
        </form>
    </div>
</body>
</html>
