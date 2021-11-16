<?php
ini_set("default_charset", "UTF-8");
mb_internal_encoding("UTF-8");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'r0udgmtz@gmail.com';                     //SMTP username
    $mail->Password   = 'larosanegra13';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('r0udgmtz@gmail.com', 'Informacion');
    $mail->addAddress('r0udgmtz@gmail.com', 'Rodrigo');     //Add a recipient
    // Enviando Mensaje

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Información León Wireless';
    $mail->Body    = "El cliente <b> $nombre </b>. intento comunicarse sus datos y solicitud son la siguiente: \n
    <b>Nombre:</b> $nombre \n
    <b>correo electrónico: </b> $correo \n
    <b>Telefóno: $telefono </b> \n
    <b>Mensaje:</b> $mensaje";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('location:mensaje-de-envio.html');
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
