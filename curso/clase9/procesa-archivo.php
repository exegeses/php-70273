<?php
    // capturamos el archivo enviado
    // $archivo = $_POST['prdImagen'];
    $archivo = $_FILES['prdImagen'];
    echo '<pre>';
    print_r($archivo);
    echo '</pre>';

include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>publicación de un archivo en el server</h1>

        <div class="alert p-4 col-8 mx-auto shadow">
            Nombre original de archivo: <?= $_FILES['prdImagen']['name'] ?>
            <br>
            Tipo de archivo: <?= $_FILES['prdImagen']['type'] ?>
<?php
    /*#####   subida de archivo a server   */
        $dir = 'productos/'; //directorio
    /* Creamos el directorio solamente si no existe */
        if( !is_dir($dir) ){
            // echo 'creamos directorio';
            mkdir($dir);
        }
        //echo 'directorio existente';

        $nombreOriginal = $_FILES['prdImagen']['name'];
        $tmp = $_FILES['prdImagen']['tmp_name'];
        $ext = pathinfo( $nombreOriginal, PATHINFO_EXTENSION );
        //renombramos archivo
        $prdImagen = time().'.'.$ext;
        //subimos archivo
        move_uploaded_file( $tmp, $dir.$prdImagen );
?>

        </div>

    </main>
<?php
include '../layouts/footer.php';
