<?php
include '../layouts/header.php';

    $dividendo = 5;
    $divisor = 0;
    try {
        // intentamos hacer algo
        $resultado = $dividendo / $divisor;
        echo $resultado;
    }
    catch ( Error $e ){
        //Si falla capturamos el error o la excepción
        echo $e->getMessage(), '<br>';
        echo $e->getFile(), '<br>';
        echo $e->getLine(), '<br>';
        echo $e->getCode(), '<br>';
    }

?>
    <main class="container py-4">
        <h1>Menejo de errores y excepciones</h1>



    </main>
<?php
include '../layouts/footer.php';
