<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];
    $query = "INSERT INTO brands (brand_name) VALUES ('$brand_name')";

    if ($conn->query($query) === TRUE) {
        echo "Brand added successfully!";
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
    <title>Insert Brand</title>
</head>
<body>
    <div class="form-container">
        <h1>Insert New Brand</h1>
        <form method="post">
            <input type="text" name="brand_name" placeholder="Brand Name" required>
            <button type="submit">Insert Brand</button>
        </form>
    </div>
</body>
</html>
