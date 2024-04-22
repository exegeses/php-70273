<?php
    require 'config/config.php';
    require 'src/Exception.php';
    require 'src/SMTP.php';
    require 'src/PHPMailer.php';
    require 'funciones/mail.php';
    //capturamos datos enviados por el form
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $consulta = $_POST['consulta'];
    //configuramos datos de email a enviar
    //$destinatario = 'manzana@dropjar.com';
    $asunto = 'Email enviado desde CatalogoPHP';

    $cuerpo = HTMLMAILHEADDER;
    $cuerpo .= 'Nombre: '.$nombre. "<br>";
    $cuerpo .= 'Email: '.$email. "<br>";
    $cuerpo .= 'Consulta: '.$consulta. "<br>";
    $cuerpo .= '<img src="https://php-70273.000webhostapp.com/imagenes/m-iso.jpg" style="width: 32px">';
    $cuerpo .= HTMLMAILFOOTER;
    //enviamos email
    $check = enviarMail($asunto, TOADDRESS, $cuerpo);
    $mensaje = 'No se pudo enviar el email';
    if( $check ){
        $mensaje = 'Gracias '. $nombre.' por su consulta';
    }

    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container">
        <h1>Formulario de contacto</h1>


        <div class="alert p-4 col-8 mx-auto shadow">
            Gracias <?= $nombre ?> por su consulta
        </div>

    </main>

<?php  include 'layouts/footer.php';  ?>