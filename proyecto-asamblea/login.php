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
echo <<<_END
<form action="login.php" method="post" id="login-form">
    <fieldset class="form-header">
        <label for=""></label>
        <span class="error">$error</span>
    </fieldset>
    <div class="fieldcontain">
        <label for=""></label>
        Por favor introduce tus datos para iniciar sesión
    </div>
    <div class="fieldcontain">
        <label for="user">Nombre de Usuario</label>
        <input type="text" name="user" id="username" maxlength="16" value="$user">
    </div>
    <div class="fieldcontain">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="password" maxlength="16" value="$pass">
    </div>
    <div class="fieldcontain">
        <label for=""></label>
        <input type="submit" value="Iniciar Sesión">
    </div>
</form>
</div>
</body>
</html>


_END;
?>

