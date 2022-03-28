<?php
        // DOBLE COMPROBACIÓN DEL USUARIO CON ESTE BLOQUE Y CON EL ONBLUR DE CHECKUSER.PHP; 
require_once 'functions.php';
require_once 'setup.php';

if (isset($_POST['org-name'])) {
    # code...
    $org=sanitizeString($_POST['org-name']);
    $result=queryMysql("SELECT * FROM organism WHERE name='$user'");

    if ($result->num_rows) {
        echo `<span class='taken'>&nbsp;&#x2718; "El nombre de organismo $org ya está en uso"</span>`;
    }else{
        echo `<span class='available'>&nbsp;&#x2714; El nombre de organismo está disponible</span>`;
    }
}
?>