<?php
    /* CRUD de productos */

    function listarProductos() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT prdNombre, prdPrecio, prdImagen
                    FROM productos";
        return mysqli_query( $link, $sql );
    }