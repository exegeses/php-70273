<?php
    session_start();

    //eliminar 1 (una) variable de sesión
    unset($_SESSION['datos']);

    //eliminar todas las variables de sesión
    session_unset();

    // eliminar la sesión
    session_destroy();