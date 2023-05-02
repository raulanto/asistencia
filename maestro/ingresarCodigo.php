<?php

//guardar codigo en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $IDGRUPO = $_GET['IDGRUPO']; 
    $IDMAESTRO = $_GET['IDMAESTRO']; 
    $IDPERIODO = $_GET['IDPERIODO']; 
    $codigo = $_GET['codigo'];
    $fecha = $_GET['fecha'];

    require_once ('../BD/conection.php');

    $query = "INSERT INTO `codigo`(`codigo`, `fechahora`, `fk_grupo`, `fk_periodo`, `fk_maestro`) VALUES ( '$codigo', '$fecha', '$IDGRUPO', '$IDPERIODO', '$IDMAESTRO')";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        // La inserción se realizó correctamente
        //$filas_afectadas = mysqli_affected_rows($conexion);
        //echo "Se insertó correctamente el registro. Filas afectadas: " . $filas_afectadas;
        header("Location: ../maestro/codigoGenerado.php?IDMAESTRO=".$IDMAESTRO."&IDGRUPO=".$IDGRUPO."&codigo=".$codigo);
    } 

}

?>
