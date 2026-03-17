<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minzo_clothing";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $email);

// Set parameters and execute
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Sign up successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>