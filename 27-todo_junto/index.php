<?php

// session_start();

require_once 'header.php';

echo "<div class='center'>Welcome to Rodrigos Nest</div>";

if ($loggedin) {

    echo "$user, you are logged in";

} else {
    echo <<<_END

            </div> <br>

            </div>
            <div data-role="footer">
                <h4>Web App from <i><a href="http://lpmj.net/%thedition" target="_blank">Learning PHP MySQL & Javascript ed. 5</a></i></h4>
            </div>
        </body>

        </html>


    _END;
}

?>
