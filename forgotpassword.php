<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["uname"])) {
    header("refresh: 0.5; url = private.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="requestreset.php" method="post">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" name="submit" value="Request Password Reset">
    </form>
    <a href="index.php">Back to Login</a>
</body>
</html>
