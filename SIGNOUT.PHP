<?php
if (session_status() >= 0) {
    session_start();

    session_unset();
    session_destroy();
    echo "<div class='message'>You are now being redirected...</div>";
}

header("refresh: 2; url = index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
</body>
</html>
