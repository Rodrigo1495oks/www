<?php
require_once "functions.php";

session_start();

echo <<<_INIT

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicativo Asambleas</title>
    <link rel="stylesheet" href="style.css">
    <script src="js.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head>
    <script src="https://kit.fontawesome.com/78e00f4d2a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
_INIT;


$userstr="Bienvenido visitante";

if (isset($_SESSION['user'])) {
    $user=$_SESSION['user'];

    $loggedin=TRUE;
    $userstr=`Sesion iniciada como: $user`;

}else{

$loggedin=FALSE;

}

echo <<<_MAIN
    <body>
        <section id="page">
        <header id="header">
        <div id="logo" class="center">
        <img src="rodri.gif" alt="gif">
        Aplicativo de Asambleas
        </div>
        </header>
        <p class="username">$userstr</p>
        </section>
        <section id="content">
_MAIN;

if ($loggedin) {
    echo <<<_LOGGEDIN
        <nav class="menu center">
            <ul class="menu-list">
                <li class="menu-list_item"><i class="fa-solid fa-house"></i><a href="members.php?view='$user'">Inicio</a></li>
                <li class="menu-list_item"><i class="fa-solid fa-user-group"></i><a href="organism.php">Organismo de la Asamblea</a></li>
                <li class="menu-list_item"><i class="fa-solid fa-user-group"></i><a href="members.php">Miembros</a></li>
                <li class="menu-list_item"><i class="fa-solid fa-sitemap"></i><a href="hierarchies.php">Jerarquías</a></li>
                <li class="menu-list_item"><i class="fa-brands fa-meetup"></i><a href="meeting.php">Reuniones</a></li>
                <li class="menu-list_item"><i class="fa-solid fa-user"></i><a href="profile.php">Perfiles</a></li>
                <li class="menu-list_item"><i class="fa-solid fa-arrow-right-from-bracket"></i><a href="logout">Salir</a></li>
            </ul>
        </nav>

    _LOGGEDIN;
}else{
    echo <<<_GUEST

        <nav class="menu center">
            <ul class="menu-list">
            <li class="menu-list_item"><i class="fa-solid fa-house"></i><a href="index.php'">Inicio</a></li>
            <li class="menu-list_item"><i class="fa-solid fa-user-plus"></i><a href="signup.php">Registrarse</a></li>
            <li class="menu-list_item"><i class="fa-solid fa-arrow-right-to-arc"></i><a href="login.php">Iniciar Sesión</a></li>
            </ul>
        </nav>
        <p class='notice-not-logged'>Debes estar registrado e iniciar sesión para usar esta aplicación</p>


    _GUEST;
}

?>