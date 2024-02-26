<?php
include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Bucles en PHP</h1>

        <select name="anio">
<?php
    $inicio = 1960;
    $fin = date('Y');
    while( $inicio <= $fin ){
        //echo '<option value="', $inicio, '">',  $inicio, '</option>';
?>
        <option value="<?= $inicio ?>"><?= $inicio ?></option>
<?php            
        $inicio++;
    }
?>
        </select>

        <!-- combo de los meses -->
        <select name="mes">
<?php
        for( $n = 1; $n <= 12; $n++ ){
?>
            <option value="<?= $n ?>"><?= $n ?></option>
<?php
        }
?>
        </select>
        <hr>
















    </main>
<?php
include '../layouts/footer.php';