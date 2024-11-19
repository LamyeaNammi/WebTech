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
    // Fetch the submitted username and password from the form
    $username = $conn->real_escape_string(trim($_POST['uname']));
    $password = trim($_POST['pass']); // Plain-text password input
    
    // Query to check if the user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If a matching user is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Compare the plain-text password directly
        if ($password === $user['password']) {
            // Login successful, set session and redirect
            $_SESSION['uname'] = $username;
            header("Location: Borrow.html"); // Redirect to Borrow.html
            exit();
        } else {
            // If password is incorrect
            echo "Invalid password.";
        }
    } else {
        // If username doesn't exist
        echo "User not found.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
