<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    // Validate passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'minzo_clothing');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database using prepared statements
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepared statement failed: " . $conn->error);
    }
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: login.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
