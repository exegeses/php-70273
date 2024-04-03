<?php

    function listarRoles() : mysqli_result
    {
        $link = conectar();
        $sql = "SELECT * FROM roles";
        return mysqli_query( $link, $sql );
    }