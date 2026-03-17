<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM categories";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Categories</title>
</head>
<body>
    <div class="view-container">
        <h1>View Categories</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
