<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM orders";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Orders</title>
</head>
<body>
    <div class="view-container">
        <h1>View Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
