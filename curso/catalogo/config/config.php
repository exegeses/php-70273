<?php
    ##### archivo de configuración
    session_start();

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    /* email */
    const HOST          = 'smtp.gmail.com';
    const USERNAME      = 'cursosdesarrollophp@gmail.com';
    const MAILPASSWORD  = 'mkmm clph ttsc ugra';
    const MAILFROM      = 'CatalogoPHP@hell.com';
    const MAILFROMNAME  = 'CatalogoPHP';
    const TOADDRESS     = 'manzana@dropjar.com'; // destinatario
    // layout
    const HTMLMAILHEADDER= '<div style="background-color: #222529;
                           color: #fff;
                           font-size: 24px;
                           padding: 32px;
                           width: 520px;
                           margin: 32px auto;
                           font-weight: 600;
                           border: none;
                           border-bottom: 8px solid #73d1b2;
                           border-radius: 0px 0px 8px 8px">';
    const HTMLMAILFOOTER= '</div>';


