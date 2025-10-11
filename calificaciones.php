<?php 

$alumnos = [ "Camilo", "Juan", "Roberto", "Julian", "Jesus", "Martin", 
"Ana", "Luis", "Fatima", "Jabon"];

$calificaciones = [ "0", "1", "2", "3", "4" , "5", "6", "7", 
"8", "9", "10", "NP"];

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Calificaciones</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1> Mis Alumnos</h1>
        <form method="POST" action="estaditicas.php">
            <table border="1px">
                <tr>
                    <th>Nombre</th>
                    <th>Calificación</th>
                </tr>

                <?php 
                    foreach ($alumnos as $alumno) {
                        echo "<tr>";
                        echo "<td>" . $alumno . "</td>";
                        echo "<td> <select name='calif[]'>";

                        foreach ($calificaciones as $calificacion) {
                            echo "<option value='" . $calificacion . "'>" . $calificacion . "</option>";
                        }

                        echo "</select> </td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <input type="submit">
        </form>
    </body>
</html>