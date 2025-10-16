<?php 


$total = 0; 
$apb  = 0;
$rps = 0;
$totalalumnos = 0;
$totalnp = 0;


$alumnos = [ "Camilo", "Juan", "Roberto", "Julian", "Jesus", "Martin", 
"Ana", "Luis", "Fatima", "Jabon"];

foreach($alumnos as $alumno){
    $valor = $_REQUEST["cbo".$alumno];

    if($valor != "NP"){
        $total += $valor;
        $totalalumnos++;
        if($valor >= 6){
            $apb++;
        }else if($valor !="NP"){
            $rps++;
        }

    }
    else{
        $totalnp++;
    }
}

echo "Alumnos Totales: " . $totalalumnos . "<br><br>";
echo "Alumnos con NP: " . $totalnp . "<br><br>";
echo "Alumnos Aprobados: " . $apb . "<br><br>";
echo "Alumnos Reprobados: " . $rps . "<br><br>";

if($totalalumnos > 0){
    $promedio = $total / ($totalalumnos);
    echo "Aprovechamiento General: " . $promedio . "<br><br>";
    echo "Aprobados: " . ($apb  / ($totalalumnos) * 100) . "% <br><br>";
    echo "Reprobados: " . ($rps / ($totalalumnos) * 100) . "% <br><br>";
}else{
    echo "No se encontraron alumnos";
}



if(count($_REQUEST) > 0){

    $mejor = 0;
    $peor = 10;
    $area_oportunidad = []; 



    foreach($alumnos as $alumno){
        $valor = $_REQUEST["cbo".$alumno];

        if($valor == "NP" || ($valor != "NP" && $valor < 6)){
            $area_oportunidad[] = $alumno . " (" . $valor . ")";
        }

        if($valor != "NP"){
            if($valor > $mejor){ $mejor = $valor; }
            if($valor < $peor){ $peor = $valor; }
        }
    }

    echo "La calificación más alta es: " . $mejor . "<br>";
    echo "La calificación más baja es: " . $peor . "<br>";
    

    echo "<h4>Alumnos en área de oportunidad:</h4>";
    if(count($area_oportunidad) > 0){
        foreach($area_oportunidad as $a){
            echo $a . "<br>";
        }
    } else {
        echo "Ninguno";
    }

}else{
    echo "No se enviaron calificaciones aún.";
}

?>