<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/SMTP.php';
require 'src/PHPMailer.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cursosdesarrollophp@gmail.com';                     //SMTP username
    $mail->Password   = 'mkmm clph ttsc ugra';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('CatalogoPHP@hell.com', 'CatalogoPHP');
    $mail->addAddress('manzana@dropjar.com', 'Manzana');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('nobody@hell.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email enviado desde CatalogoPHP';
    $cuerpo = '<div style="background-color: #222529;
                           color: #fff;
                           font-size: 24px;
                           padding: 32px;
                           width: 520px;
                           margin: 32px auto;
                           font-weight: 600;
                           border: none;
                           border-bottom: 8px solid #73d1b2;
                           border-radius: 0px 0px 8px 8px">';
    $cuerpo .= 'Nombre: '. "<br>";
    $cuerpo .= 'Email: '. "<br>";
    $cuerpo .= 'Consulta: '. "<br>";
    $cuerpo .= '<img src="https://php-70273.000webhostapp.com/imagenes/m-iso.jpg" style="width: 32px">';
    $cuerpo .= '</div>';

    $mail->Body    = $cuerpo;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Email enviado correctamente';
} catch (Exception $e) {
    echo "No se pudo enviar el email. Mailer Error: {$mail->ErrorInfo}";
}