<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require_once("../../DTO/DTORequests/GetUserDTORequests.php");

function sendMail2() {
    $nameto = $_SESSION['loggeduser']->getUsername();
    $to = $_SESSION['loggeduser']->getEmail();
    $subject = 'Project Request';
    $message = 'Dear ' . $nameto . ',<br> your request has been received and is currently being studied!';
    $headers = "from: Agency <teamtia7@gmail.com>\r\n";
    $headers .= "content-type:text/html\r\n";
    mail($to, $subject, $message, $headers);
}

function sendMail() {
// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
// Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'teamtia7@gmail.com';                     // SMTP username
        $mail->Password = 'Teamtia@123';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//Recipients
        $mail->setFrom('teamtia7@gmail.com', 'Agency TeamTia');

        $mailto = $_SESSION['loggeduser']->getEmail();
        $nameto = $_SESSION['loggeduser']->getUsername();

        $mail->addAddress($mailto, $nameto);     // Add a recipient    sessionnnn
// Name is optional
        $mail->addReplyTo('info@example.com', 'Information');


// Attachments
//   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//   $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Project Request';
        $mail->Body = 'Dear' . $nameto . ', your request has been received and is currently being studied!';
        $mail->AltBody = 'Thank your interest in our agency best regards,TeamTia';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
