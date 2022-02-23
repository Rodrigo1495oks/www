<?php

require_once 'header.php';

echo <<<_END
        <script>
            function checkUser(user) {
                if (user.value=='') {
                    $("#used").html("&nbsp;")
                    return
                }
            
                $.post (
                    'checkuser.php',
                    {user:user.value},
                    function(data){
                        $("#used").html(data)
                    }
                )
            }
        </script>

_END;

$error=$user=$pass='';
if(isset($_SESSION['user'])) {
    destroySession();
}

if (isset($_POST['user'])) {
    $user=sanitizeString($_POST['user']);
    $pass=sanitizeString($_POST['pass']);

    $hashedPassword=password_hash($pass, PASSWORD_DEFAULT); // USO EL HASH PARA MAYOR SEGURIDAD


    if ($user==''||$pass='') {
        # code...
        $error='Not all fields were entered <br> <br>';
    }else{
        $result=queryMysql("SELECT * FROM members WHERE user='$user'");
        if ($result->num_rows) {
            $error="That username already exists <br> <br>";
            
        }else{


            queryMysql(`INSERT INTO members VALUES('$user','$hashedPassword')`); //cargo el hash - y creo el usuario con el hash


            if ($user==''||$pass=='') {
              die("<h4>Account Created</h4> Please Log in.</div> </body> </html>");

            }
        }
    }

   
}

echo <<<_FINAL

<form action="signup.php" method="post">
$error
<div class="" data-role="fieldcontain"> <!-- cabecera del formulario-->
    <label for=""></label>
    Please enter your details to sign up
</div>
<div data-role="fieldcontain"><!-- campo del usuario-->
    <label for="">User Name</label>
    <input type="text" name="user" id="username" maxlength="16" value="$user" onblur="checkUser(this)"> <!-- devuelve el valor del formulario "this"-->

</div>
<div data-role="fieldcontain"> <!-- campo de la contraseña-->
    <label for="">Password</label>
    <input type="password" name="pass" id="password" maxlength="16" value="$pass"> <!-- devuelve el valor del formulario "this"-->
</div>
<div data-role="fieldcontain"> <!-- submit del formulario -->
    <label for=""></label>
    <input type='submit' data-transition='slide' value='Sign Up'></input>

</div>
</form>
</div>

</body>
</html>

_FINAL;
?>






