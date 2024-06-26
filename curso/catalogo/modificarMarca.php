<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $check = modificarMarca();
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de una marca</h1>

<?php
        $mensaje = 'No se pudo modificar la marca: '.$_POST['mkNombre'];
        $css = 'danger';
        if( $check ) {
            $mensaje = 'Marca: ' . $_POST['mkNombre'] . ' modificada correctamente.';
            $css = 'success';
        }
?>        
        <div class="alert alert-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
            <a href="adminMarcas.php" class="btn btn-dark sep">
                volver al panel
            </a>
        </div>

    </main>

<?php  include 'layouts/footer.php';  ?>