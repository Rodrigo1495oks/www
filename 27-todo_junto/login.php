<?php
require_once "header.php";

$error=$user=$pass='';

if (isset($_POST['user'])) {
    $user=sanitizeString($_POST['user']);
    $pass=sanitizeString($_POST['pass']);
    $hashedPass=password_hash($pass, PASSWORD_DEFAULT);

    if ($user==''||$pass='') {
        $error='Not all field were entered';

    }else{
        $result=queryMysql("SELECT user, pass FROM members WHERE user='$user' AND pass='$hashedPass'");
        
        if ($result->nums_row==0) {
            $error='Invalid login attempt';
        }else{
            $_SESSION['user']=$user;
            $_SESSION['pass']=$pass;

            die(`You are now logged in. Please <a href="members.php?view=$user" data-transition="slide">Click here</a> to continue </div> </body> </html>`);
        }
    }
}

echo <<<_END
            <form action="login.php" method="post">
                <div class="" data-role="fieldcontain">
                    <label for=""></label>
                    <span class="error">$error</span>
                </div>
                <div class="" data-role="fieldcontain">
                    <label for=""></label>
                    Please enter your details to log in
                </div>
                <div class="" data-role="fieldcontain">
                    <label for="">Username</label>
                    <input type="text" name="user" id="username" maxlength="16" value='$user'>
                </div>
                <div class="" data-role="fieldcontain">
                    <label for="">Password</label>
                    <input type="pass" name="pass" id="password" maxlength="16" value='$pass'>
                </div>
                <div class="" data-role="fieldcontain">
                    <label for=""></label>
                    <input type="submit" value="Login" data-transition="slide">
                </div>
            </form>
        </div>
    </body>
</html>
_END;


?>


