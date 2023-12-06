<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate data (you can add more validation if needed)

    // Send email
    $to = "james@story-x.co.uk";
    $subject = "New Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Build email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Send email
    mail($to, $subject, $body, $headers);

    // Optionally, you can redirect the user to a thank you page
    header("Location: thank_you.html");
    exit;
}
?>