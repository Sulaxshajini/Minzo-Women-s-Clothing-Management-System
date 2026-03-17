<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'minzo_clothing');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user data
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        header("Location: index.html");
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
