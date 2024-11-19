<?php
session_start(); // Start the session at the beginning

// Redirect if the user is already logged in
if (isset($_SESSION["uname"])) {
    header("refresh: 0.5; url=private.php");
    exit();
}

// Process the login form
if (isset($_POST["submit"])) {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'library');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query
    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    // Check if user exists
    if ($count == 1) {
        $_SESSION["uname"] = $uname;
        echo "<div class='success'>You are now redirected</div>";
        header("refresh: 2; url=private.php");
        exit();
    } else {
        echo "<div class='error'>User not found</div>";
        header("refresh: 2; url=index.php");
        exit();
    }
} else {
    echo "<div class='error'>Fill the username and password.</div><br>";
    header("refresh: 2; url=index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error {
            color: red;
            font-weight: bold;
            margin: 10px 0;
        }

        .success {
            color: green;
            font-weight: bold;
            margin: 10px 0;
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 3px;
            border: 1px solid #ddd;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <label>Username</label>
            <input type="text" name="uname" required>

            <label>Password</label>
            <input type="password" name="pass" required>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>
