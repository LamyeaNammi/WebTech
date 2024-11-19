<?php
// Database configuration
$host = 'localhost'; // usually localhost
$dbname = 'library'; // your database name
$username = 'root'; // default username for XAMPP
$password = ''; // default password is empty for XAMPP

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $studentName = $conn->real_escape_string($_POST['studentname']);
    $studentId = $conn->real_escape_string($_POST['studentid']);
    $book = $conn->real_escape_string($_POST['book']);
    $borrowDate = $conn->real_escape_string($_POST['borrowdate']);
    $returnDate = $conn->real_escape_string($_POST['returndate']);

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO borrowings (student_name, student_id, book, borrow_date, return_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $studentName, $studentId, $book, $borrowDate, $returnDate);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Book borrowed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<a href="Borrow.html">Go back to the form</a>
