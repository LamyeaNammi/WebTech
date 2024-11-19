<?php
if (isset($_POST["submit"])) {
    $email = $_POST["email"];

    $conn = mysqli_connect('localhost', 'root', '', 'app_users');
    $sql = "SELECT * FROM records WHERE username = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Generate a unique token for password reset
        $token = bin2hex(random_bytes(16));
        $expire = date("U") + 3600; // Token expires in 1 hour

        $sql = "INSERT INTO password_resets (email, token, expires_at) VALUES ('$email', '$token', FROM_UNIXTIME($expire))";
        mysqli_query($conn, $sql);

        // Send email with password reset link
        $resetLink = "http://yourdomain.com/resetpassword.php?token=$token";
        $subject = "Password Reset Request";
        $message = "To reset your password, please click the following link: $resetLink";
        mail($email, $subject, $message);

        echo "A password reset link has been sent to your email.";
    } else {
        echo "Email not found.";
    }
}
?>
