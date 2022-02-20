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
<title>Rodrigo app</title>
</head>

<body>
    <div data-role="page">
        <div data-role="header">
            <div id="logo" class="center">
                R
                <img src="rodri.gif" alt="a" id="rodrigo">drigo Nest
            </div>
            <div class="username">$userstr</div>
            <div data-role="content">


_MAIN;

if ($loggedin) {
    # code...
    echo <<<_LOGGEDIN
        <div class="center">
            <a href="members.php?view=$user" data-role="button" data-inline="true" data-icon="home" data-transition="slide">Home</a>
            <a href="members.php" data-role="button" data-inline="true" data-transition="slide">Members</a>
            <a href="friends.php" data-role="button" data-inline="true" data-transition="slide">Friends</a>
            <a href="messages.php" data-role="button" data-inline="true" data-transition="slide">Messages</a>
            <a href="profile.php" data-role="button" data-inline="true" data-transition="slide">Profile</a>
            <a href="logout.php" data-role="button" data-inline="true" data-transition="slide">Log Out</a>
        </div>
    _LOGGEDIN;
}else{
    echo <<<_GUEST
        <div class="center">
            <a href="index.php" data-role="button" data-inline="true" data-icon="home" data-transition="slide">Home</a>
            <a href="signup.php" data-role="button" data-inline="true" data-icon="plus" data-transition="slide">Sign Up</a>
            <a href="login.php" data-role="button" data-inline="true" data-icon="check" data-transition="slide">Log In</a>

        </div>
        
        <p class="info">
        you must be logged in to use this ap
        </p>

    _GUEST;
}
?>

