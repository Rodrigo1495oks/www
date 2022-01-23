<?php

if (isset($_GET("url"))) {
    # code...
    echo file_get_contents("http://". sanitizeString($_GET("url")));

}
function sanitizeString($string)
{
    $var=strip_tags($string);
    $var=htmlentities($var);
    return stripslashes($var);
}

?>