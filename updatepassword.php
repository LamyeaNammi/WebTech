<?php
if (isset($_POST["submit"])) {
    $token = $_POST["token"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    if ($pass !== $cpass) {
        echo "<div class='error'>Passwords do not match.</div>";
        exit();
    }

    $conn = mysqli_connect('localhost', 'root', '', 'app_users');
    $sql = "SELECT * FROM password_resets WHERE token = '$token' AND expires_at > NOW()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $email = $row["email"];

        $hashedPass = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "UPDATE records SET password = '$hashedPass' WHERE username = '$email'";
        mysqli_query($conn, $sql);

        $sql = "DELETE FROM password_resets WHERE token = '$token'";
        mysqli_query($conn, $sql);

        echo "<div class='success'>Password updated successfully.</div>";
        header("refresh: 2; url = index.php");
    } else {
        echo "<div class='error'>Invalid or expired token.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .reset-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .reset-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .reset-container input[type="text"],
        .reset-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 3px;
            border: 1px solid #ddd;
        }

        .reset-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            cursor: pointer;
        }

        .reset-container input[type="submit"]:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h2>Password Reset</h2>
        <form method="POST">
            <label for="token">Token</label>
            <input type="text" name="token" required>

            <label for="pass">New Password</label>
            <input type="password" name="pass" required>

            <label for="cpass">Confirm Password</label>
            <input type="password" name="cpass" required>

            <input type="submit" name="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>
