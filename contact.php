<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
    // Collect form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

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

    // You can customize the response message
    $response = array("status" => "success", "message" => "Your message has been sent successfully!");

    // Convert the array to JSON and echo it
    echo json_encode($response);
} else {
    // Invalid request
    $response = array("status" => "error", "message" => "Invalid request. Please check your form and try again.");
    echo json_encode($response);
}
?>
