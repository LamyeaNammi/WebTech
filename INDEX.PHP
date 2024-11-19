<?php
if (session_status() >= 0) {
    session_start();
    if (isset($_SESSION["uname"])) {
        header("refresh: 1; url = private.php");
        // echo $_SESSION["uname"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP APP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 6px rgba(0, 0, 0, 0.1);
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .login-form a {
            color: #0066cc;
            text-decoration: none;
        }
        .login-form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <form action="loginprocess.php" method="post">
            <label for="uname">Username</label><br>
            <input type="text" id="uname" name="uname" required><br><br>

            <label for="pass">Password</label><br>
            <input type="password" id="pass" name="pass" required><br><br>

            <input type="submit" name="submit" value="Login"><br>
        </form>
        <a href="signup.php">Sign Up</a>
    </div>
</body>
</html>
