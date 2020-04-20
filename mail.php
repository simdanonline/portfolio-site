<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.similoluwaodeyemi.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'similoluwa@similoluwaodeyemi.com';                     // SMTP username
    $mail->Password   = 'jomiloju2000';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('similoluwa@similoluwaodeyemi.com', 'Similoluwa');
    $mail->addAddress('similoluwa@similoluwaodeyemi.com', 'Joe User');     // Add a recipient
    // $mail->addAddress('similoluwa@similoluwaodeyemi.com');               // Name is optional
    $mail->addReplyTo('similoluwa@similoluwaodeyemi.com', 'Similoluwa');
    $mail->addCC('similoluwa@similoluwaodeyemi.com');
    $mail->addBCC('similoluwa@similoluwaodeyemi.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contact Similoluwa '.$_POST['subject'];
    $mail->Body    = 'From '.$_POST['name']. $_POST['email']. 'message content: '.$_POST['message'];
    $mail->AltBody = $_POST['message'];

    $mail->send();
    echo 'Message has been sent';
    header("Location: http://similoluwaodeyemi.com");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}