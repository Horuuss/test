<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data to prevent XSS or malicious content
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Recipient email address (you can change this to the desired email)
    $to = "alexanderdinsmore@yahoo.com";

    // Subject of the email
    $subject = "New Contact Form Message from " . $name;

    // Prepare the email content
    $body = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <h2>Message from: $name</h2>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$message</p>
    </body>
    </html>
    ";

    // Set headers for the email (MIME type for HTML email)
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";  // Sender's email

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
