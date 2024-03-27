<?php
    // directiva de sesión
    /* si la sesión no existe entonces la crea,
    en cambio si la sesión ya existe te da acceso para utilizarla */
    session_start();

    // registramos variables de sesión
    $_SESSION['nombre'] = 'marcos';
    $_SESSION['numero'] = 666;
