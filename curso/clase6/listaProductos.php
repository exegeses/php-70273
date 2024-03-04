<?php
    require 'funciones/conexion.php';
    require 'funciones/productos.php';
    $productos = listarProductos();
    include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Listado de productos</h1>

        <section id="listado">
    <?php
        while( $producto = mysqli_fetch_assoc( $productos ) ){
    ?>
            <article>
                <img src="productos/<?= $producto['prdImagen'] ?>">
                <div>
                    <h2><?= $producto['prdNombre'] ?></h2>
                    <span>$<?= $producto['prdPrecio'] ?></span>
                </div>
            </article>
    <?php
        }
    ?>    
        </section>


    </main>
<?php
include '../layouts/footer.php';