<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'src/Exception.php';
    require 'src/SMTP.php';
    require 'src/PHPMailer.php';
    require 'funciones/mail.php';
    require 'funciones/usuarios.php';
    $check = resetPWStep2();
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Reestablecer contraseña</h1>

        <div class="alert p-4 col-8 mx-auto shadow">
<?php
    $mensaje = 'No se pudo realizar la acción solicitada
                <a href="reset-pw-step1.php">intente nuevamente</a>';
    if( $check ) {
        $mensaje = "Hemos enviado un email con el 
                    código de verificación, chequee su coreo
                    para cambiar la contraseña.";
    }
?>
        <div class="alert text-info p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
        </div>
<?php
    if( $check ){
?>
        <div class="alert p-4 col-8 mx-auto shadow">
            <form action="reset-pw-step3.php" method="post">
                Ingrese el código enviado <br>
                <input type="text" name="codigo" class="form-control my-3">
                <button class="btn btn-dark">enviar</button>
            </form>
        </div>
<?php
    }
?>

        </div>



    </main>

<?php  include 'layouts/footer.php';  ?>