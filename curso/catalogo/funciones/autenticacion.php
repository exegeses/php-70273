<?php

    function login() : void
    {
        $email = $_POST['email'];
        $clave = $_POST['clave']; // sin encriptar
        $link = conectar();
        $sql = "SELECT  idUsuario, nombre, apellido, clave, idRol 
                    FROM usuarios
                    WHERE email = '".$email."'
                     AND activo = 1";
        $resultado = mysqli_query( $link, $sql );
        $cantidad = mysqli_num_rows($resultado);
        /**
         * ## si cantidad == 0  ->  nombre de usuario MAL
         * ## si cantidad == 1  ->  nombre de usuario BIEN
         */
        if( $cantidad == 0 ){
            // redirección a formLogin enviando error
            header('location: formLogin.php?error=1');
        }
    }

    function logout()
    {}

    function autenticar()
    {}