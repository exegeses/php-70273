<?php
    include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Mostrar datos enviados por el form</h1>

<?php
    //capturamos datos enviados por el form
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    echo 'Tu nombre es: ', $nombre;
    echo '<br>';
    echo 'Tu email es: ', $email;
?>        

    </main>
<?php
    include '../layouts/footer.php';