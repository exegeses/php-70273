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

    function verProductoPorID() : array
    {
        $idProducto = $_GET['idProducto'];
        $link = conectar();
        $sql = "SELECT *
                    FROM productos as p 
                    JOIN marcas as m
                      ON p.idMarca = m.idMarca
                    JOIN categorias as c
                      ON p.idCategoria = c.idCategoria
                  WHERE idProducto = ".$idProducto;
        $resultado = mysqli_query($link, $sql);
        return  mysqli_fetch_assoc( $resultado );
    }


    /**
     * Función para subir archivos
     * @return string
     */
    function subirImagen() : string
    {
        #### si NO enviaron archivo
        $prdImagen = 'noDisponible.svg';

        #### si ENVIARON archivo && está todo ok
        if( $_FILES['prdImagen']['error'] == 0 ) {
            $dir = 'productos/'; //directorio
            /* Creamos el directorio solamente si no existe */
            if (!is_dir($dir)) {
                // echo 'creamos directorio';
                mkdir($dir);
            }
            //echo 'directorio existente';

            $nombreOriginal = $_FILES['prdImagen']['name'];
            $tmp = $_FILES['prdImagen']['tmp_name'];
            $ext = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
            //renombramos archivo
            $prdImagen = time() . '.' . $ext;
            //subimos archivo
            move_uploaded_file($tmp, $dir . $prdImagen);
        }
        return $prdImagen;
    }

    function agregarProducto()
    {
        //captura de datos enviados por el form
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];
        $prdImagen = subirImagen();

        $link = conectar();
        $sql = "INSERT INTO productos
                    VALUE
                    ( 
                        DEFAULT,
                        '".$prdNombre."',
                        ".$prdPrecio.",
                        ".$idMarca.",
                        ".$idCategoria.",
                        '".$prdDescripcion."',
                        '".$prdImagen."',
                        DEFAULT
                     )";
        try {
            return mysqli_query($link, $sql);
        } catch (Exception $e) {
            return false;
        }
    }
/*
 *  listarProductos()
 *  verProductoPorID()
 *  agragarProducto()
 *  modificarProducto()
 *  eliminarProductos()
 *
 * */

