
<?php 
    $nombre_archivo = basename(__FILE__);

include("../plantillas/header.php"); ?>
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
        $filas_afectadas = mysqli_affected_rows($conexion);
        echo "Se insertó correctamente el registro. Filas afectadas: " . $filas_afectadas;
    } else {
        // Ocurrió un error durante la inserción
        echo "Error en la inserción: " . mysqli_error($conexion);
    }
}


// INSERT INTO `codigo`(`codigo`, `fechahora`, `fk_grupo`, `fk_periodo`, `fk_maestro`) VALUES ( 'sdfs', 'werw', 4, 4, 4)
?>

<main class="container m-auto  h-screen">
   <section class="flex justify-center items-center h-screen">
     <div class="w-96 p-3 shadow-lg bg-white rounded-md">
            <h1 class="text-4xl block text-center font-bold">Codigo Generado</h1>
            <hr class="mt-3">
            <h1 class="text-4xl block text-center font-bold"><?php echo $codigo?></h1>
    <div class="mt-5 flex items-center">
            <?php
    echo '<a href="panelMaestro.php?ID=' . $IDMAESTRO . '" class="text-center w-full border-2 border-red-700 bg-red-700 text-white py-1 rounded-md hover:bg-transparent hover:text-red-700 font-semibold">Terminar</a>';
?>

            </div>
        </div>
   </section>
       
    
</main>

<?php include("../plantillas/footer.php"); ?>