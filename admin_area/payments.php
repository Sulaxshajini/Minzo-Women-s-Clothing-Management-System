<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM payments";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Payments</title>
</head>
<body>
    <div class="view-container">
        <h1>View Payments</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['payment_date']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
