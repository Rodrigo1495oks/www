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












?>

