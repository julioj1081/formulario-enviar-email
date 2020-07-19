<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';


$nombre = $_POST['nombre'];
$email_usuario = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com; smtp.live.com;';      // 'smtp.live.com'; smtp.gmail.com Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'julioj1081@gmail.com';                 // SMTP username acceso para entra a la cuenta
    $mail->Password   = 'wasd1081';                             // SMTP password acceso para entra a la cuenta
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   //tls    // Enable TLS encryption, `ssl` also accepted
  
    $mail->Port       = 587;                                   // 587 TCP port to connect to

    //Recipients
    //Recipients
       $mail->setFrom($_POST['email'], $_POST['nombre']); //Desde donde se va a enviar
       $mail->addAddress('julioj1081@gmail.com');         // Aquien se le va a enviar

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje de portafolio ';
    $mail->Body    = '<br>'.$_POST['nombre'].
                     '<p>'.$_POST['mensaje'].'</p>
                      <br><br>'
                      .$_POST['email'];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'.$_POST['email'];

    $mail->send();
    echo 'Message has been sent de';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>