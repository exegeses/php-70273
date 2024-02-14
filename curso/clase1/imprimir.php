<?php

    const NOMBRE = 'Marcos';
    const APELLIDO = 'Pinardi';
    $curso = 'Desarrollo web con PHP y MySQL';

    echo NOMBRE, ' ', APELLIDO, ': ', $curso; // 1 OPERACIÓN
    echo NOMBRE. ' '. APELLIDO. ': '. $curso; # 5 OPERACIONES

    /*####   ¿cúando concatenar?  ####*/
    $minimo = 1500;
    $maximo = 3000;
    $sql = "SELECT * 
                FROM productos
                WHERE precio 
                        BETWEEN ".$minimo." AND ".$maximo;
