<?

if (isset($_POST("url"))) {
    # code...
    echo file_get_contents("http://". sanitizeString($_POST("url")));
}

function sanitizeString($string)
{
    $var=strip_tags($string);
    $var=htmlentities($var);
    return stripslashes($var);
}
?>