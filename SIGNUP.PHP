<?php
if (session_status() >= 0) {
    session_start();
    if (isset($_SESSION["uname"])) {
        header("refresh: 0.5; url=private.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP APP - Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .registration-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .registration-form input[type="text"],
        .registration-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .registration-form input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .registration-form input[type="submit"]:hover {
            background-color: #218838;
        }
        .registration-form input[type="submit"]:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <h2>Forget Password</h2>
        <form action="process.php" method="post">
            <label for="uname">Email</label><br>
            <input type="text" id="uname" name="uname" required><br><br>

            <label for="pass">Password</label><br>
            <input type="password" id="pass" name="pass" required><br><br>

            <label for="cpass">Confirm Password</label><br>
            <input type="password" id="cpass" name="cpass" required><br><br>

            <input type="submit" name="submit" value="Submit"><br><br>
        </form>
    </div>
</body>
</html>
