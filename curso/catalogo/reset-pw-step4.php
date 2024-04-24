<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $check = resetPWStep4();
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de un contraseña</h1>

<?php
        $mensaje = 'No se pudo modificar la contraseña';
        $css = 'danger';
        if( $check ) {
            $mensaje = 'Contraseña: modificada correctamente.';
            $css = 'success';
        }
?>        
        <div class="alert alert-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
            <a href="formLogin.php" class="btn btn-dark sep">
                Ya puede loguearse para acceder a sistema
            </a>
        </div>

    </main>

<?php  include 'layouts/footer.php';  ?>