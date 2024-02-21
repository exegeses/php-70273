<?php
include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Casteo de variables</h1>
<?php
    $nombre = 'marcos';
?>
    <?= 'Tu nombre es: $nombre';//No casteo la variable ?>
    <br>
    <?= "Tu nombre es: $nombre";//SI casteo la variable  PERO ESTÁ MUY MAL ?>
    <br>
    <?= 'Tu nombre es: ', $nombre;//ESTÁ BIEN ?>
    </main>
<?php
include '../layouts/footer.php';