<?php
    require 'config/config.php';
    //capturamos datos enviados por el form
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $consulta = $_POST['consulta'];
    //configuramos datos de email a enviar
    $destinatario = 'manzana@dropjar.com';
    $asunto = 'Email enviado desde CatalogoPHP';
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
    $cuerpo .= 'Nombre: '.$nombre. "<br>";
    $cuerpo .= 'Email: '.$email. "<br>";
    $cuerpo .= 'Consulta: '.$consulta. "<br>";
    $cuerpo .= '<img src="https://php-70273.000webhostapp.com/imagenes/m-iso.jpg" style="width: 32px">';
    $cuerpo .= '</div>';
    //$headers = 'From: elon@tesla.com'."\r\n";
    //$headers .= 'Reply-to: nobody@tesla.com'."\r\n";
    //$headers .= 'Carbon-copy: nobody@tesla.com'."\r\n";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    //enviamos email
    mail($destinatario, $asunto, $cuerpo, $headers);

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