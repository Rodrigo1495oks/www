<?php

require_once "header.php";

if (!$loggedin) {
    die("</div></body></html>");

    echo "<h3> Tu Perfil</h3>";

    $result=queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if (isset($_POST['text'])) {
        $text=sanitizeString($_POST['text']);
        $text=preg_replace('/\s\s+/',' ', $text);

        if ($result->num_rows) {
            queryMysql("UPDATE profiles SET text='$text' WHERE user='$user'");

        }else{
            queryMysql("INSERT INTO profiles VALUES('$user','$text')");
        }
    }else{
        if ($result->num_rows) {
            $row=$result->fetch_array(MYSQLI_ASSOC);
            $text=stripslashes($row['text']);

        }else{
            $text='';
        }
    }
    $text=stripslashes(preg_replace('/\s\s+/',' ',$text));

    if (isset($_FILES['image']['name'])) {
        $saveto="$user.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'],$saveto);
        $typeok=TRUE;

        switch ($_FILES['image']['type']) {
            case 'image/gif':
                $src=imagecreatefromgif($saveto);
                break;
            case 'image/jpeg':
                $src=imagecreatefromjpeg($saveto);
                break;
            case 'image/pjpeg':
                $src=imagecreatefromjpeg($saveto);
                break;
            case 'image/png':
                $src=imagecreatefrompng($saveto);
                break;
            default:
                $typeok=FALSE;
                break;
        }

        if ($typeok) {
            $list($w,$h)=getimagesize($saveto);

            $tmp=imagecreatetruecolor($w,$h);
            imagejpeg($tmp,$saveto);
            imagedestroy($tmp);
            imagedestroy($src);

        }
    }
}

?>