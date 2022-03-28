<?php


$hn='localhost';
$db='assembly';
$un='rodrigo';
$pw='12345';

$connection= new mysqli($hn, $un, $pw, $db);

if ($connection->connect_error) {
    mysqlFatalError();

}

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' ha sido creada o ya existe. <br>";

}

function queryMysql($query)
{
    global $connection;
    $result=$connection->query($query);
    if (!$result) {
        # code...
        mysqlFatalError("Consulta no realizada");
        echo "<br> $connection->connect_error";
    }

    return $result;
}
function destroySession()
{
    $_SESSION=array();

    if (session_id()!='' || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-2592000, '/');
    }
}

function sanitizeString($var)
{
    global $connection;
    $var=strip_tags($var);
    $var=htmlentities($var);

    if (get_magic_quotes_gpc()) {
        $var= stripslashes($var);

    }
    return $connection->real_escape_string($var);
}

function showProfile($user)
{
    if (file_exists("$user.jpg")) {
        echo "<img src='$user.jpg' style='float:left'>";
    }
    $result=queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows) {
        $row=$result->fetch_array(MYSQLI_ASSOC);
        echo stripslashes($row['text']) . "<br style='clear:left'> <br>";

    }else{
        echo "<p> Nada para mostrar aqui, aún...</p> <br>";
    }
}
function mysqlFatalError($mensaje)
{
    echo <<<_M
    Lo sentimos, pero no fue posible completar la tarea requerida. el mensaje de error es:

    <p> $mensaje <p>

    Por favor haga click en el boton de atras en tu navegador e intenta de nuevo. si aun sigues teniendo problemas, por favor
    <a href='mailto:admin@server.com'>email our administrator </a>. Thank you

    _M;

}
?>