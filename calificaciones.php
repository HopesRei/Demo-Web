<?php 

$alumnos = [ "Camilo", "Juan", "Roberto", "Julian", "Jesus", "Martin", 
"Ana", "Luis", "Fatima", "Jabon"];

$calificaciones = [ "0", "1", "2", "3", "4" , "5", "6", "7", 
"8", "9", "10", "NP"];

?>
<html>
 <head></head>
 <body>
   <h1>Mis alumnos</h1>
   <form method="POST" action="estadisticas.php">
   <table border="1px">
	<?php foreach($alumnos as $alumno): ?>
    <tr>
      <th>Nombre</th>
      <th>Calificacion</th>
    </tr>
    <tr>
	<td><label><?php echo $alumno ?></label>
	</td>
	<td><select name="cbo<?php echo $alumno ?>">
	     <?php foreach($calificaciones as $calif): ?>
	     <option><?php echo $calif ?>
	     <?php endforeach ?>
	     </option>
	  </select>
	</td>
	</tr>
	<?php endforeach ?>
    </table>
            <input type="submit">
        </form>
    </body>
</html>