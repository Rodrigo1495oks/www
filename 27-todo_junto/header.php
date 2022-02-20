<?php

session_start();

echo <<<_INIT
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="jqueryMobile/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <script src="jquery.js"></script>

_INIT;

require_once 'functions.php';

$userstr='Welcome Guest';

if (isset($_SESSION['user'])) {
    # code...
    $user=$_SESSION['user'];
    $loggedin=TRUE;
    $userstr="Logged in as: $user";
}else{
    $loggedin=FALSE;
}

echo <<<_MAIN

_MAIN;

?>

<title>Rodrigo app</title>
</head>

<body>
    <div data-role="page">
        <div data-role="header">
            <div id="logo" class="center">
                R
                <img src="rodri.gif" alt="a" id="rodrigo">drigo Nest
            </div>
        </div>
    </div>
</body>

