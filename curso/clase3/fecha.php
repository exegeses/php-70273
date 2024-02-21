<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
include '../layouts/header.php';
?>
    <main class="container py-4">
        <h1>Fecha usando PHP</h1>
<?php
    /* mostrar fecha
        formato: Miércoles 21/02/2024
    */
    //echo date('d/m/Y');
    echo date('d/m/Y H:i:s');
?>
<hr>
<?php
    $nDiaSemana = date('w');
    switch( $nDiaSemana ){
        case 0:
            echo 'Domingo';
            break;
        case 1:
            echo 'Lunes';
            break;
        case 2:
            echo 'Martes';
            break;
        case 3:
            echo 'Miércoles';
            break;
        case 4:
            echo 'Jueves';
            break;
        case 5:
            echo 'Viernes';
            break;
        default:
            echo 'Sábado';
            break;
    }
?>
<hr>
<?php
    //$nDiaSemana = date('w');
    $diaSemana = match( $nDiaSemana ){
            '0'=>'Domingo',
            '1'=>'Lunes',
            '2'=>'Martes',
            '3'=>'Miércoles',
            '4'=>'Jueves',
            '5'=>'Viernes',
            default=>'Sábado'
    };
    echo $diaSemana, ' ', date('d/m/Y');
?>

    </main>
<?php
include '../layouts/footer.php';