<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
    $query = "INSERT INTO categories (category_name) VALUES ('$category_name')";

    if ($conn->query($query) === TRUE) {
        echo "Category added successfully!";
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
    <title>Insert Category</title>
</head>
<body>
    <div class="form-container">
        <h1>Insert New Category</h1>
        <form method="post">
            <input type="text" name="category_name" placeholder="Category Name" required>
            <button type="submit">Insert Category</button>
        </form>
    </div>
</body>
</html>
