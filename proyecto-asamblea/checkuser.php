<?php
        // DOBLE COMPROBACIÓN DEL USUARIO CON ESTE BLOQUE Y CON EL ONBLUR DE CHECKUSER.PHP; 
require_once 'functions.php';
require_once 'setup.php';

if (isset($_POST['user'])) {
    # code...
    $user=sanitizeString($_POST['user']);
    $result=queryMysql("SELECT * FROM members WHERE user='$user'");

    if ($result->num_rows) {
        echo `<span class='taken'>&nbsp;&#x2718; "El nombre de ussuario $user ya está en uso"</span>`;
    }else{
        echo `<span class='available'>&nbsp;&#x2714; El nombre de usuario está disponible</span>`;
    }
}
?>