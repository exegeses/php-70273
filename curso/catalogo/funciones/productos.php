<?php

/*### crud de productos ###*/

    function listarProductos() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT *
                    FROM productos as p 
                    JOIN marcas as m
                      ON p.idMarca = m.idMarca
                    JOIN categorias as c
                      ON p.idCategoria = c.idCategoria";
        return mysqli_query($link, $sql);
    }

    function subirImagen() : string
    {

    }

    function agregarProducto( )
    {
        //captura de datos enviados por el form
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];
        $prdImagen = subirImagen();

    }
/*
 *  listarProductos()
 *  varProductoPorID()
 *  agragarProducto()
 *  modificarProducto()
 *  eliminarProductos()
 *
 * */

