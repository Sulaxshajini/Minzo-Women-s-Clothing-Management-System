<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Products</title>
</head>
<body>
    <div class="view-container">
        <h1>View Products</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['brand_id']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><img src="../product_images/<?php echo $row['image']; ?>" width="100" /></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
