<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['nom']) && isset($_POST['email'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
// Load Composer's autoloader
require 'vendor/autoload.php';



// Instantiation and passing `true` enables exceptions
// require 'class.smtp.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hamoda.compte@gmail.com';                     // SMTP username
    $mail->Password   = 'khedhkvjupowvngf';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;  
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('hamoda.compte@gmail.com', 'admin');
    // $mail->addAddress('hamoda.compte@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress($email,$nom);               // Name is optional
    $mail->addReplyTo('hamoda.compte@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'demande';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
echo 'success';
}