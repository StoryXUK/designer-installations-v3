<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // You can add additional validation or processing here

    // Send email (example)
    $to = "james@story-x.co.uk";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    // Customize the email body as needed
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message";

    // Send the email
    mail($to, $subject, $email_body, $headers);

    // Optionally, you can redirect the user to a thank you page
    header("Location: thank_you.html");
    exit();
}
?>
