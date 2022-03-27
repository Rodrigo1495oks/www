<?php

require_once 'header.php';

$error=$user=$pass='';

if (isset($_POST['user'])) {
    
    $user=sanitizeString($_POST['user']);
    $pass=sanitizeString($_POST['pass']);

    if ($user==''||$pass=='') {
        # code...
        $error='Algunos campos están vacios';
    }else{
        $result=queryMysql("SELECT user, pass FROM members WHERE user='$user' AND pass='$pass'");
        if ($result->num_rows==0) {
            $error='Usuario o contraseña incorrectos';
        }else{
            $_SESSION['user']=$user;
            $_SESSION['pass']=$pass;

            die(`Ahora has iniciado sesión. Por Favor,<a href='members.php?view="$user"'>Haz Click aquí</a>para continuar. </div></body></html>`);
        }
    }
}

?>

