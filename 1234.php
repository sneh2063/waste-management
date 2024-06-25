<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format, you may handle this according to your requirements
        echo "Invalid email format";
        exit();
    }

    // Generate a verification code (you may use any other method to generate a code)
    $verificationCode = rand(100000, 999999);

    // Send verification email
    $to = $email;
    $subject = "Email Verification Code";
    $message = "Your verification code is: $verificationCode";
    $headers = "From: your_email@example.com";

    if (mail($to, $subject, $message, $headers)) {
        // Verification email sent successfully
        echo "Verification email sent. Please check your email to verify.";
    } else {
        // Failed to send verification email
        echo "Failed to send verification email. Please try again later.";
    }
} else {
    // Invalid request method
    echo "Invalid request method";
}
?>
