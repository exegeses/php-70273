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
            return;
        }
        /*####
        En este punto sabemos que el e-mail ingresado es correcto
        y además que el usuario está activo
        */
        //Verificamos la contraseña
        $usuario = mysqli_fetch_assoc($resultado);
        if( !password_verify( $clave, $usuario['clave'] ) ){
            ## Al negar password_verify() sabemos que
            # la conttraseña es incorrecta
            header('location: formLogin.php?error=1');
            return;
        }
        /*  Si llegamos a este punto sabemos que el usuario
            se logueó correctamente.
            Por lo tanto debemos comenzar la rutina de
            autenticación (sesiones)
         **/
        ################## RUTINA DE AUTENTICACIÓN
        ###########################################
        $_SESSION['login'] = 1;
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];
        $_SESSION['idRol'] = $usuario['idRol'];

        header('location: admin.php');
    }

    function logout() : void
    {
        //Eliminamos todas las variables de sesión
        session_unset();
        //Eliminamos la sesión
        session_destroy();
    }

    function autenticar() : void
    {
        if ( !isset( $_SESSION['login'] ) ){
            header('location: formLogin.php?error=2');
        }
    }

    function noAdmin() : void
    {
        //si el usuario no es administrador
        if( $_SESSION['idRol'] != 1 ){
            header('location: noAdmin.php');
        }
    }