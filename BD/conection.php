<?php
    $usuario    = 'root';
    $contrasena = '';
    $servidor   = 'localhost';
    $basedatos  = 'asistencia_alumnos';
    $conexion   = mysqli_connect($servidor, $usuario, "JIRAFA2340.") or die ("No se a podido conectar a la base de datos");
    $db         = mysqli_select_db($conexion, $basedatos) or die ("Lo sentimos, pues va a ser que no se ha podido conectar a la base de datos");
?>

<?php
// Glitty by Alexia Rivera.
// Last revision: 11/03/2023