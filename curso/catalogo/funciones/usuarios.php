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

    function verUsuarioPorID() : array
    {
        $idUsuario = $_GET['idUsuario'];
        $link = conectar();
        $sql = "SELECT idUsuario, nombre, apellido, email, 
                       idRol
                  FROM usuarios
                  WHERE activo = 1
                    AND idUsuario = ".$idUsuario;
        $resultado = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($resultado);
    }

    function modificarClave() : bool
    {
        //Capturamos la clave actual sin encriptar
        $clave = $_POST['clave'];
        //Obtenemos la clave actual encriptada
        $link = conectar();
        $sql = "SELECT clave FROM usuarios
                    WHERE idUsuario = ".$_SESSION['idUsuario'];
        $resultado = mysqli_query($link, $sql);
        $usuario = mysqli_fetch_assoc($resultado);
        /* Verificamos la clave enviada con la clave de la base de datos */
        if( !password_verify($clave, $usuario['clave']) ){
            //Si no coinciden ---> redirigimos
            // al formulario de modificación enviando un mensaje de error
            header('location: formModificarClave.php?error=1');
            return false;
        }
        /* en este punro sabemos que la contraseña actual es correcta
         */
        //comparamos contraseña nueva con la repetida
        if( $_POST['newClave'] != $_POST['newClave2'] ){
            // redirección al formulario de modificación enviando un mensaje de error
            header('location: formModificarClave.php?error=2');
            return false;
        }
        /* En ester punto sabemos que la contraseña es correcta
           y que la contraseña nueva y la repetida coinciden
         * */
        # enciptamos la contraseña nueva
        $claveHash = password_hash( $_POST['newClave'], PASSWORD_DEFAULT );
        /* finalmente, almacenamos la contraseña nueva (encriptada)
            en tabla usuarios
        */
        $sql = "UPDATE usuarios
                    SET clave = '".$claveHash."'
                  WHERE idUsuario = ".$_SESSION['idUsuario'];
        try {
            return mysqli_query($link, $sql);
        }catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    function modificarUsuario() : bool
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $idRol = $_POST['idRol'];
        $idUsuario = $_POST['idUsuario'];
        $link = conectar();
        $sql = "UPDATE usuarios 
                    SET nombre = '".$nombre."',
                        apellido = '".$apellido."',
                        email = '".$email."',
                        idRol = ".$idRol."
                    WHERE idUsuario = ".$idUsuario;
        try {
            return mysqli_query($link, $sql);
        }catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }