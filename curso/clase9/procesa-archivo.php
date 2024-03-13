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

        </div>

    </main>
<?php
include '../layouts/footer.php';
