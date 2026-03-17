<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "minzo_clothing";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

// Set parameters and execute
$username = $_POST['username'];
$password = $_POST['password'];
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Successful login
    session_start();
    $_SESSION['username'] = $username;
    header("Location: index.html");
} else {
    // Login failed
    echo "Invalid username or password.";
}

$stmt->close();
$conn->close();
?>