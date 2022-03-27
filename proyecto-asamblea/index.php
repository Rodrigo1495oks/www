<?php

session_start();

require_once 'header.php';


echo `<section class="center">
<p class="welcome" >Bienvenido al Aplicativo de la Autoridad Superior</p>`;

if ($loggedin) {
    # code...
    echo "$user, has ingresado al sistema";
}else{
    echo "por favor, inicie sesión o registrese";
}

echo <<<_END

</div><br>
<footer id="footer" class="footer">
    <h4>Aplicativo Web creado por el Contador Rivas Rodrigo</h4>
</footer>
</body>
</html>

_END;






?>


