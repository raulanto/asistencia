

<?php
    //conexion  a la base de datos 
    $usuario    = 'root';
    $contrasena = '';
    $servidor   = 'localhost';
    $basedatos  = 'asistenciaalumnos';
    $conexion   = mysqli_connect($servidor, $usuario, $contrasena) or die ("No se a podido conectar a la base de datos");
    $db         = mysqli_select_db($conexion, $basedatos) or die ("Lo sentimos, pues va a ser que no se ha podido conectar a la base de datos");
?>


