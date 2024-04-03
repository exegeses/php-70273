<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $check = modificarUsuario();
    /*  */
    if( $check && $_SESSION['idRol']!= 1 ){
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['apellido'] = $_POST['apellido'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['idRol'] = $_POST['idRol'];
    }
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de un usuario</h1>

<?php
        $nombre = $_POST['nombre'].' '.$_POST['apellido'];
        $mensaje = 'No se pudo modificar el usuario: '.$nombre;
        $css = 'danger';
        if( $check ) {
            $mensaje = 'Usuario: ' . $nombre . ' modificado correctamente.';
            $css = 'success';
        }
?>        
        <div class="alert alert-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
            <a href="admin.php" class="btn btn-dark sep">
                volver al panel
            </a>
        </div>

    </main>

<?php  include 'layouts/footer.php';  ?>