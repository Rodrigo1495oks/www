<?php
require_once 'header.php';

echo <<<_END
    <script>
        function checkUser(user) {
            if (user.value=='') {
                $('#used').html('&nbsp')
                return;
            }
            $.post('checkuser.php',{user:user.value},function (data) {
                $('#used').html(data)
            })
        }
    </script>
_END;


$error=$user=$pass='';
if (isset($_SESSION['user'])) {
    # code...
    destroySession();
}
if (isset($_POST['user'])) {
    # code...
    $user=sanitizeString($_POST['user']);
    $pass=sanitizeString($_POST['pass']);

    if ($user==''||$pass=='') {
        # code...
        $error='Algunos campos estan vacios <br> <br>';
    }else{
        $result=queryMysql("SELECT * FROM members WHERE user='$user'");

        if($result->num_rows){
            $error='<p class="error-duplicated">El nombre de usuario indicado ya esta en uso</p><br><br>';
        // DOBLE COMPROBACIÓN DEL USUARIO CON ESTE BLOQUE Y CON EL ONBLUR DE CHECKUSER.PHP; 
        }else{
            queryMysql("INSERT INTO members VALUES('$user','$pass')");
            die("<h4>Cuenta creada</h4>Por favor inicie sesión.</div></body></html>");
        }
    }
}

echo <<<_SIGN

            <form action="signup.php" method="post" id="signup-form">
                <div class="form-header">
                    <p class="form-title">Por favor, introduce tus datos</p>
                </div>
                <div class="fieldcontain">
                    <label for="user">Nombre de Usuario: </label>
                    <input type="text" name="user" id="user" value="$user" onblur="checkUser(this)">
                    <label for="used"></label>
                    <div id="used">&nbsp;</div>
                </div>
                <div class="fieldcontain">
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass" maxlength="16" value="$pass">
                </div>
                <div class="fieldcontain">
                    <label for="submit"></label>
                    <input type="submit" value="Registrarse">
                </div>
            </form>
        </body>
    </html>

_SIGN;

?>
