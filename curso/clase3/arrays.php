<?php
include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Arrays en PHP</h1>
<?php
    $marcas = [
                'Puma', 'Adidas', 'Lacoste',
                'New Balance', 'Nike', 'Under Armour',
                'Umbro'
    ];
    echo $marcas[2];
?>
<hr>
<pre><?php print_r($marcas); ?></pre>
<hr>
<?php
    $pilotos =
        [
            1 => 'Max Verstappen',
            11 => 'Checo Péreza',
            63 => 'George Russell',
            44 => 'Lewis Hamilton'
        ];
?>
<pre><?php print_r($pilotos); ?></pre>
<hr>
<?php
    $pilotos =
            [
                'RedBull' => 'Max Verstappen',
                'Mercedes' => 'George Russell',
                'Ferrari' => 'Charles LeClerc',
                'Aston Martin' => 'Fernando Alonso'
            ];
?>
<pre><?php print_r($pilotos); ?></pre>
<?= $pilotos['Aston Martin'] ?>


    </main>
<?php
include '../layouts/footer.php';