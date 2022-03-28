<?php
require_once 'functions.php';
require_once 'header.php';

if (!$loggedin) {
    die("</div></body></html>");
}
$error=$user=$pass='';
if (isset($_SESSION['user'])) {
    # code...
    destroySession();
}

echo <<<_END
    <script>
        function checkOrg(org) {
            if (user.value=='') {
                $('#used').html('&nbsp')
                return;
            }
            $.post('checkorg.php',{organism:org.value},function (data) {
                $('#used').html(data)
            })
        }
    </script>
_END;

if (isset($_POST['org-name'])) {
    # code...
    $org=sanitizeString($_POST['org-name']);
    $desc=sanitizeString($_POST['org-desc']);

    if ($org==''||$desc='') {
        $error="Algunos campos estan vacios <br> <br>";
    }else{
        $result=queryMysql("SELECT * FROM organism WHERE name='$org'");
        
        if ($result->num_rows) {
            $error='<p class="error-duplicated">El organismo indicado ya esta en uso</p><br><br>';
        }else{
            queryMysql("INSERT INTO organism VALUES('$org','$desc')");
            die("<h4> Organismo cargado al sistema</h4>.");
        }
    }
}
echo <<<_ORG

<form action="organism.php" method="post" id="form-organism">
    <div class="form-header">
        <p class='form-title'>Formulario para intrducir organismos</p>
    </div>
    <div class="fieldcontain">
        <label for="org-name">Introduzca el nombre del organismo de la asamblea</label>
        <input type="text" name="org-name" id="org-name" onblur="checkOrg(this)">
        <label for="used"></label>
        <div id="used">&nbsp;</div>
    </div>
    <div class="fieldcontain">
        <label for="org-desc">Introduzca la descripción del organismo de la asamblea</label>
        <textarea name="org-desc" id="org-desc" cols="30" rows="10"></textarea>
        <label for="used"></label>
        <div id="used">&nbsp;</div>
    </div>
    <div class="fieldcontain">
        <label for=""></label>
        <input type="submit" value="Agregar organismo">
    </div>
</form>

_ORG;

?>


