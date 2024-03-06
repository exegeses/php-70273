<?php

    /*#### crud de marcas ####*/

    function listarMarcas() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT * FROM marcas
                  ORDER BY idMarca";
        return mysqli_query($link, $sql);
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

    /*
     * verMarcaPorID()
     * modificarMarca()
     * eliminarMarca()
     * */