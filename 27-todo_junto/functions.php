<?php

$hn = 'localhost';
$db = 'red-social';
$un = 'root';
$pw = '';

$connection = new mysqli($hn, $un, $pw, $db);

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table $name created or already exists. <br>";
}

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);

    if (!$result) {
        # code...
        die(" <b>fatal error </b>");
    }

    return $result;
}

function destroySession()
{
    $_SESSION = array();

    if (session_id() == '' || isset($_COOKIE[session_name()])) {
        # code...
        setcookie(session_name(), '', time() - 2592000, '/');
    }
    session_destroy();
}

function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);

    if (get_magic_quotes_gpc()) {
        $var = stripslashes($var);
    }

    return $connection->real_escape_string($var);
}

function showProfile(string $user = null)
{
    # code...
    if (file_exists("$user.jpg")) {
        echo `<img src="$user.jpg" alt="$user" title="Usuario activo" style="float: left;" >;`;
    }
    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }else{
        echo "<p>Nothin to see here, yet</p>";
    }
}

?>


