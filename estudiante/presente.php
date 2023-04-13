
<?php     
$nombre_archivo = basename(__FILE__);
include("../plantillas/header.php"); 
?>


<?php

// guardar codigo en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $IDLISTAGRUPO = $_GET['IDLISTAGRUPO']; 
    $Observacion=$_GET['observacion'];
    $codigo = $_GET['codigo'];
    $fecha= date('Y-m-d H:i:s');

    require_once ('../BD/conection.php');
    // Realizar la inserción en la tabla asistencia
    $results_insert = "INSERT INTO `asistencia` (`codigo`, `fechahora`, `observacion`, `fk_listagrupo`) 
    VALUES ('$codigo', '$fecha', '$Observacion', '$IDLISTAGRUPO')";
    // Ejecutar la consulta de inserción
    $resultado_insert = mysqli_query($conexion, $results_insert);

    // Si la inserción se realizó correctamente, realizar la selección en la tabla estudiante
    if ($resultado_insert==TRUE) {
        $results_select = "SELECT
        estudiante.ID 
    FROM
        listagrupo
        INNER JOIN estudiante ON listagrupo.fk_estudiante = estudiante.ID 
    WHERE
        listagrupo.ID = '$IDLISTAGRUPO'";
        // Ejecutar la consulta de selección
        $resultado_select = mysqli_query($conexion, $results_select);
        // Obtener el resultado de la consulta de selección
        $fila = mysqli_fetch_assoc($resultado_select);
        $id = $fila['ID'];
    }

 }
?>
<main class="container m-auto  h-screen">
   <section class="flex justify-center items-center h-screen">
     <div class="w-100 p-3 shadow-lg bg-white rounded-md">
            <h1 class="text-4xl block text-center font-bold">Asistencia Tomada</h1>
            <hr class="mt-3">
            <h1 class="text-4xl block text-center font-bold">Fecha <?php echo $fecha; ?></h1>
            <h1 class="text-4xl block text-center font-bold">Codigo <?php echo $codigo; ?></h1>

            <h1 class="text-4xl block text-center font-bold"></h1>
            <div class="mt-5 flex items-center">
            <?php
    echo '<a href="panelEstudiante.php?ID=' . $id . '" class="text-center w-full border-2 border-red-700 bg-red-700 text-white py-1 rounded-md hover:bg-transparent hover:text-red-700 font-semibold">Terminar</a>';
?>

            </div>
        </div>
   </section>
       
    
</main>

<?php include("../plantillas/footer.php"); ?>