<?php
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to get the admin details from the database
    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['username'];
            header("Location: index.php"); // Redirect to the dashboard
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid username!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="form-container">
        <h1>Admin Login</h1>
        <form method="post">
            <input type="text" name="username" placeholder="Admin Username" required>
            <input type="password" name="password" placeholder="Admin Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
