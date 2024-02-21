<?php
include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>null coalessing - fusión de null</h1>
<?php
    //$x =( $n < 10 ) ? 'menor': 'no menor';
    if( isset( $_GET['algo'] ) ){
        $x = $_GET['algo'];
    }
    else{
        $x = 'NO EXISTE o es nulo';
    }
    echo $x;
?>
<hr>
<?php
    $y = $_GET['algo'] ?? 'NO EXISTE o es nulo';
    echo $y;
?>

    </main>
<?php
include '../layouts/footer.php';