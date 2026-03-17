<?php
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Check if the username already exists
    $check = "SELECT * FROM admins WHERE username='$username'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "Username already exists!";
    } else {
        // Insert the new admin into the database
        $query = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
        if ($conn->query($query) === TRUE) {
            echo "Admin registered successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register Admin</title>
</head>
<body>
    <div class="form-container">
        <h1>Register Admin</h1>
        <form method="post">
            <input type="text" name="username" placeholder="Admin Username" required>
            <input type="password" name="password" placeholder="Admin Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
