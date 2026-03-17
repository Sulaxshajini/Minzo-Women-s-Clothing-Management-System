<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM brands";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Brands</title>
</head>
<body>
    <div class="view-container">
        <h1>View Brands</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand Name</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['brand_name']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
