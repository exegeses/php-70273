<?php
    include '../layouts/header.php';
    //declaración
    function negrita( string $frase = 'manzana' ) : string
    {
        //no está bien un echo dentro de una función
        $mensaje = '<b>'.$frase.'</b><br>';
        return $mensaje;
    }
    function sumar( float $num1, float $num2 ) : float
    {
        return $num1 + $num2;
    }
    function esPar( int $numero ) : string
    {
        if( $numero % 2 == 0 ){
            //return true;
            return 'si';
        }
        //return false;
        return 'no';
    }
    /**
     *  generar una cadena de caracteres aleatoria
     * */
    function passwordGenerator( int $length = 16 ) : string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $claveGenerada = '';
        for( $n = 0; $n < $length; $n ++ ){
            $claveGenerada .= $characters[ rand(0, $charactersLength - 1) ];
        }
        return $claveGenerada;
    }
?>
    <main class="container py-4">
        <h1>Funciones personalizadas en PHP</h1>
<?php
    //invocar
    echo negrita('texto en negrita');
    echo negrita('hola mundo');
    echo negrita('funciones en php');
    echo negrita();
?>
<hr>
    suma: <?= sumar( 5.5, 10.8 ) ?>
<hr>
    ¿es par?: <?= esPar( 7 ) ?>
<hr>
    clave hash: <?= passwordGenerator() ?>
        
        
    </main>
<?php
    include '../layouts/footer.php';