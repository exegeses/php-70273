<?php
include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Bucles en PHP</h1>
<?php
    $marcas = [
        'Puma', 'Adidas', 'Lacoste',
        'New Balance', 'Nike', 'Under Armour',
        'Umbro'
    ];
    $cantidad = count($marcas);
?>
    <ul class="list-group col-4 mx-auto">
<?php
    for( $n = 0; $n < $cantidad; $n ++ ){
?>
        <li class="list-group-item list-group-item-action"><?= $marcas[$n] ?></li>
<?php
    }
?>
    </ul>


    </main>
<?php
include '../layouts/footer.php';