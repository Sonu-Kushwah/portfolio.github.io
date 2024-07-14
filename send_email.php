<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "sonukushwah362@gmail.com"; // Replace with your email address
    $subject = "Contact Form Submission: " . $subject;
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Email content
    $email_content = "<html><body>";
    $email_content .= "<h2>Contact Form Submission</h2>";
    $email_content .= "<p><strong>Name:</strong> " . $name . "</p>";
    $email_content .= "<p><strong>Email:</strong> " . $email . "</p>";
    $email_content .= "<p><strong>Subject:</strong> " . $subject . "</p>";
    $email_content .= "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";
    $email_content .= "</body></html>";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Your message has been sent. Thank you!";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
}
?>
