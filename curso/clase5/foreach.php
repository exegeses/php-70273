<?php
include '../layouts/header.php';
$marcas = [
    'Puma', 'Adidas', 'Lacoste',
    'New Balance', 'Nike', 'Under Armour',
    'Umbro'
];
?>
    <main class="container py-4">
        <h1>Bucle foreach()</h1>

        <ul class="list-group col-4 mx-auto">
<?php
        //foreach ( $iterable as $aux )
        foreach ( $marcas as $marca ){
?>
            <li class="list-group-item list-group-item-action">
                <?= $marca ?>
            </li>
<?php
        }
?>
        </ul>


    </main>
<?php
include '../layouts/footer.php';