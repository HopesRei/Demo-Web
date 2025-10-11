<?php 

    if ( count( $_REQUEST)>0) {
        echo "PROCESANDO ". 
        count($_REQUEST )  . " datos" . 
        "<br> Con un valor: " . $_REQUEST["dato"] ;
    } else {
        echo "acceso denegado";
    }
?>