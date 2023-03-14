<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <table>
        <tr>
            <th>
                ID
            </th>
            <th>Nombre materia</th>
            <th>
                <button>mostrar lista</button>
            </th>
        </tr>

    </table>



    <?php require_once ('DB/conection.php');
      $results= " SELECT materia.ID, materia.nombre 
                  FROM asistenciart.materia
                  WHERE 
                      ;  ";
      $resultados= mysqli_query($conexion, $results);
    ?> 
<br><br>
<div><h1>Usuario<h1></div>
<br><br>
<table width="50%" align="rigth" border="4">
    <thead>
    <tr>
    <th>ID</th>
    <th>Materia</th>
    <th>Operacion</th>

</tr>
<tr>
    <?php
    while ($columna= mysqli_fetch_array( $resultados ))
    {
        echo "<td>" . $columna['ID']    . "</td>".
             "<td>" . $columna['nombre']. "</td>".
             "<td><a href='listaestudiantes.php?id_materia='" . $columna['ID']. "</td>";
    ?>
    <td><a href=""><button type="button"> Entrar</button>

</tr>
<?php }?>
</thead>
</table>
</body>
</html>