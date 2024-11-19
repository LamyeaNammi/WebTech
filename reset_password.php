<?php
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'library'; // Your database name
$db_user = 'root'; // Default user for XAMPP
$db_pass = ''; // Default password for XAMPP is empty

// Create database connection
$conn = new mysqli($host, $db_user, $db_pass, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch the submitted username and passwords
    $username = $conn->real_escape_string(trim($_POST['uname']));
    $new_password = trim($_POST['new_pass']);
    $confirm_password = trim($_POST['confirm_pass']);

    // Check if new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the new password for security (recommended)
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update the password in the database
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
    $stmt->bind_param("ss", $hashed_password, $username);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Password successfully updated. Redirecting to login page...";
            header("refresh: 3; url=index.html"); // Redirect to login page after 3 seconds
        } else {
            echo "Username not found. Please try again.";
        }
    } else {
        echo "Error updating password: " . $conn->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
