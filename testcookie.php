<?php 
    if( isset($_COOKIE['key'])) {
        echo "La cookie existe";
    } else {
        echo "La cookie no existe";
        setcookie('key', 'value', time() + 30);
        echo "<br>... Ahora ya existe";
    }

    if( isset($_COOKIE['key'])) {
        
    }

?>