<?php

    function registrarUsuario() : bool
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];// sin encriptar
        $claveHash = password_hash( $clave, PASSWORD_DEFAULT );

        $link = conectar();
        $sql = "INSERT INTO usuarios 
                    VALUE (
                           default, 
                           '" . $nombre . "', 
                           '" . $apellido . "', 
                           '" . $email . "', 
                           '" . $claveHash . "', 
                           default, 
                           default
                           )";
        try {
            return mysqli_query($link, $sql);
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function listarUsuarios() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT idUsuario, nombre, apellido, email, 
                       idRol
                  FROM usuarios
                  WHERE activo = 1";
        return mysqli_query($link, $sql);
    }