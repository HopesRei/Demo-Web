<?php   
    session_start();
    
    if( isset($_SESSION['key'])) {
        echo "Sesion Iniciada";

    }  
    else {
        echo "Creando Session...";
        $_SESSION['key'] = "value"; 
    }
?>