<?php

    const SERVER    = 'localhost';//'sql106.infinityfree.com';
    const USUARIO   = 'root';//'if0_36330346';// 'id22022537_catalogo'
    const CLAVE     = 'root';//'AKVNsOd69sUoEqU'//'Php-70273'
    const BASE      = 'catalogo70273';//'if0_36330346_catalogo'//'id22022537_catalogo'

    function conectar() : mysqli
    {
        $link = mysqli_connect(
                SERVER,
                USUARIO,
                CLAVE,
                BASE
        );
        return $link;
    }