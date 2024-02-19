<?php
    include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Condicionales</h1>

        <div class="alert col-8 mx-auto shadow">
<?php
    //Capturamos el dato enviado por el formulario
    $numero = $_POST['numero'];
    if( $numero < 100 ){
        //Bloque de código a ejecutar si la condición es true
        echo '<img src="imgs/ok.png">';
    }else{
        //Bloque de código a ejecutar si la condición es false
        echo '<img src="imgs/error.png">';
    }
?>
        </div>


        <div class="alert col-8 mx-auto shadow">
<?php
    //No necesitamos capturar nuevamente el dato enviado
    //$numero = $_POST['numero'];
    if( $numero < 100 ){
?>
        <img src="imgs/ok.png">
<?php
    }else{
?>
        <img src="imgs/error.png">
<?php
    }
?>
        </div>

        <div class="alert col-8 mx-auto shadow">
<?php
        if( $numero < 100 ){
            $im = 'ok';
        } else{
            $im = 'error';
        }
?>
            <img src="imgs/<?php echo $im ?>.png">
        </div>

        <div class="alert col-8 mx-auto shadow">
<?php
        $im = 'error'; // prederminado
        if( $numero < 100 ){
            //Si la condición se cumple sobre escribimos la variable
            $im = 'ok';
        }
?>
            <img src="imgs/<?php echo $im ?>.png">
        </div>

        <div class="alert col-8 mx-auto shadow">
<?php
        // ( condicion ) ? 'true' : 'false'
        $im = ( $numero < 100 ) ? 'ok' : 'error';
?>
            <img src="imgs/<?php echo $im ?>.png">
        </div>



    </main>
<?php
    include '../layouts/footer.php';