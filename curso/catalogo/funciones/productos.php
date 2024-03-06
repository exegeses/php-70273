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


    function agragarProducto(  )
    {

    }
/*
 *  listarProductos()
 *  varProductoPorID()
 *  agragarProducto()
 *  modificarProducto()
 *  eliminarProductos()
 *
 * */

