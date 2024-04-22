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

/**
 *  generar una cadena de caracteres aleatoria
 * */
function passwordGenerator( int $length = 16 ) : string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $claveGenerada = '';
    for( $n = 0; $n < $length; $n ++ ){
        $claveGenerada .= $characters[ rand(0, $charactersLength - 1) ];
    }
    return $claveGenerada;
}

function checkEmailReset( $email ) : bool
{
    /* Chequear que el e-mail exista en la tabla usuarios */
    $link = conectar();
    $sql = "SELECT 1 FROM usuarios
                WHERE email = '".$email."'";
    $resultado = mysqli_query($link, $sql);
    return mysqli_num_rows($resultado);
}
function saveCodigo( string $code ) : bool
{
    $email = $_POST['email'];
    $link = conectar();
    $sql = "INSERT INTO password_reset
                VALUE
                    ( 
                        DEFAULT,
                        '".$code."',
                        '".$email."',
                        DEFAULT,
                        DEFAULT
                    )";
    try {
        return mysqli_query($link, $sql);
    }catch (Exception $e){
        echo $e->getMessage();
        return false;
    }
}

function resetPWStep2() : bool
{
    $email = $_POST['email'];
    //chequear que el email exista
    if ( !checkEmailReset($email) ){
        // si no existe
        header('location: reset-pw-step1.php?error=1');
        return false;
    }
    //generamos código aleatorio
    $codigo = passwordGenerator(8);
    //almacenamos código e email en tabla password_reset
    if ( !saveCodigo( $codigo ) ){
        return false;
    }
    //enviamos email con código
    $asunto = 'Reestablecer contraseña CatalogoPHP';

    $cuerpo = HTMLMAILHEADDER;
    $cuerpo .= 'C&oacute;digo: '."<br>";
    $cuerpo .= '<p style="font-size:32px; margin: 24px auto">'.$codigo. "</p><br>";
    $cuerpo .= '<img src="https://php-70273.000webhostapp.com/imagenes/m-iso.jpg" style="width: 32px">';
    $cuerpo .= HTMLMAILFOOTER;
    //enviamos email
    if( !enviarMail($asunto, $email, $cuerpo) ){
        return false;
    }
    return  true;
}

function resetPWStep3() : bool
{
    //chequear código !!!!  email +  activo = 1
    $codigo = $_POST['codigo'];
    $link = conectar();
    $sql = "SELECT email 
                FROM password_reset
                WHERE codigo ='".$codigo."'
                 AND activo = 1";
    $resultado = mysqli_query($link, $sql);
    if( !mysqli_num_rows($resultado) ){
        return false;
    }
    // setear activo = 0
    $sql = "UPDATE password_reset
                SET activo = 0
                WHERE codigo ='".$codigo."'";
    try {
        $dato = mysqli_fetch_assoc($resultado);
        $_SESSION['email'] = $dato['email'];
        return mysqli_query($link, $sql);
    }catch (Exception $e){
        echo $e->getMessage();
        return false;
    }
}
function resetPWStep4() : bool
{
    $email = $_SESSION['email'];
    $newClave = $_POST['newClave'];
    $newClave2 = $_POST['newClave2'];
    //modificamos clave a $email
}