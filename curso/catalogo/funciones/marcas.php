<?php

    /*#### crud de marcas ####*/

    function listarMarcas() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT * FROM marcas
                  ORDER BY idMarca";
        return mysqli_query($link, $sql);
    }

    function verMarcaPorID() : array
    {
        $idMarca = $_GET['idMarca'];
        $link = conectar();
        $sql = "SELECT * FROM marcas
                  WHERE idMarca = ".$idMarca;
        $resultado = mysqli_query($link, $sql);
        return mysqli_fetch_assoc( $resultado );
    }


    function agregarMarca() : bool
    {
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "INSERT INTO marcas
                    VALUE
                        ( DEFAULT, '".$mkNombre."' )";
        try {
            return mysqli_query($link, $sql);
        }
        catch ( Exception $e ){
            //generamos log de errores y redireccionamos la página
            //echo $e->getMessage();
            return false;
        }

    }

    function modificarMarca() : bool
    {
        $idMarca = $_POST['idMarca'];
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "UPDATE marcas 
                    SET mkNombre = '".$mkNombre."'
                  WHERE idMarca = ".$idMarca;
        try {
            return mysqli_query($link, $sql);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    /** Función para verificar si existen productos
     * asociados a una marca
     * @param string idMarca
     * @return int
     * */
    function checkProdByMarca( string $idMarca ) : int
    {
        $link = conectar();
        $sql = "SELECT 1 FROM productos
                    WHERE idMarca = ".$idMarca;
        $resultado = mysqli_query($link, $sql);
        return mysqli_num_rows($resultado);
    }

    function eliminarMarca() : bool
    {
        $idMarca = $_POST['idMarca'];
        $link = conectar();
        $sql = "DELETE FROM marcas
                  WHERE idMarca = ".$idMarca;
        try {
            return mysqli_query($link, $sql);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }