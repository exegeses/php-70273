<?php

/*### crud de productos ###*/

    function busqueda() : array
    {
        $search['search'] = $_GET['search'] ?? '';
        $search['idMarca'] = $_GET['idMarca'] ?? '';
        $search['idCategoria'] = $_GET['idCategoria'] ?? '';

        return $search;
    }

    function buscarProductos() : mysqli_result
    {
        $search = busqueda();
        $link = conectar();
        $sql = "SELECT *
                        FROM productos as p 
                        JOIN marcas as m
                          ON p.idMarca = m.idMarca
                        JOIN categorias as c
                          ON p.idCategoria = c.idCategoria
                  WHERE prdNombre LIKE '%".$search['search']."%'";

    //Sólo concatenamos idMarca si hay un valor distinto de vacío
        if( $search['idMarca'] != '' ){
            $sql .= " AND p.idMarca = ".$search['idMarca'];
        }
    //Sólo concatenamos idCategoria si hay un valor distinto de vacío
        if( $search['idCategoria'] != '' ){
            $sql .= " AND p.idCategoria = ".$search['idCategoria'];
        }

        return mysqli_query($link, $sql);
    }

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
        /*
        #### si NO enviaron archivo en formAgregar
        $prdImagen = 'noDisponible.svg';

        #### si NO enviaron archivo en formModificar
        if ( isset($_POST['imgActual']) ){
            $prdImagen = $_POST['imgActual'];
        }*/
        ##### usando un termario
        //$prdImagen = isset($_POST['imgActual']) ? $_POST['imgActual'] : 'noDisponible.svg';

        ##### usando ?? (null coalessing)
        $prdImagen = $_POST['imgActual'] ?? 'noDisponible.svg';

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

    function modificarProducto() : bool
    {
        //captura de datos enviados por el form
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];
        $prdImagen = subirImagen();
        $idProducto = $_POST['idProducto'];

        $link = conectar();
        $sql = "UPDATE productos
                    SET 
                        prdNombre   = '".$prdNombre."',
                        prdPrecio   = ".$prdPrecio.",
                        idMarca     = ".$idMarca.",
                        idCategoria = ".$idCategoria.",
                        prdDescripcion = '".$prdDescripcion."',
                        prdImagen   = '".$prdImagen."'
                    WHERE idProducto = ".$idProducto;
        try {
            return mysqli_query($link, $sql);
        } catch (Exception $e) {
            return false;
        }
    }

    function eliminarProducto() : bool
    {
        $idProducto = $_POST['idProducto'];
        $link = conectar();
        $sql = "DELETE FROM productos
                    WHERE idProducto = ".$idProducto;
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

