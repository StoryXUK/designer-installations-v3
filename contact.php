<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "james@story-x.co.uk";
    $email_subject = "Your email subject line";

    function died($error) {
        echo "<p>We are very sorry, but there were error(s) found with the form you submitted.</p>";
        echo "<p>These errors appear below.</p>";
        echo "<p>" . $error . "</p>";
        echo "<p>Please go back and fix these errors.</p>";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = trim($_POST['name']); // required
    $email_from = trim($_POST['email']); // required
    $comments = trim($_POST['message']); // required

    $error_message = "";

    // Validate email address
    if(!filter_var($email_from, FILTER_VALIDATE_EMAIL)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    // Validate name
    if(!preg_match("/^[A-Za-z .'-]+$/", $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br />';
    }

    // Validate message
    if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }

    if(strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Form details below.\n\n";
    $email_message .= "Name: " . htmlspecialchars($name) . "\n";
    $email_message .= "Email: " . htmlspecialchars($email_from) . "\n";
    $email_message .= "Comments: " . htmlspecialchars($comments) . "\n";

    // Create email headers
    $from_email = "hello@designer-instalations.co.uk";
    $headers = 'From: ' . $from_email . "\r\n" .
               'Reply-To: ' . $email_from . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Send the email
    if(mail($email_to, $email_subject, $email_message, $headers)) {
        echo "<p>Thank you for contacting us. We will be in touch with you very soon.</p>";
    } else {
        echo "<p>There was an error sending your message. Please try again later.</p>";
    }

}
?>

