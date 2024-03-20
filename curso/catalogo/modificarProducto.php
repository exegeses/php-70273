<?php
    //require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/productos.php';
    $check = modificarProducto();
    include 'layouts/header.php';
    include 'layouts/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de un producto</h1>

<?php
        $mensaje = 'No se pudo modificar el producto: '.$_POST['prdNombre'];
        $css = 'danger';
        if( $check ) {
            $mensaje = 'Producto: ' . $_POST['prdNombre'] . ' modificado correctamente.';
            $css = 'success';
        }
?>        
        <div class="alert alert-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
            <a href="adminProductos.php" class="btn btn-dark sep">
                volver al panel
            </a>
        </div>


    </main>

<?php  include 'layouts/footer.php';  ?>