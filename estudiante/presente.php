
<?php     
$nombre_archivo = basename(__FILE__);
include("../plantillas/header.php"); 
?>

<main class="container m-auto  h-screen">
   <section class="flex justify-center items-center h-screen">
     <div class="w-100 p-3 shadow-lg bg-white rounded-md">
            <h1 class="text-4xl block text-center font-bold">Asistencia Tomada</h1>
            <hr class="mt-3">
<?php
function obtener_id_estudiante($id_lista_grupo, $conexion) {
    $results_select = "SELECT estudiante.ID FROM listagrupo INNER JOIN estudiante ON listagrupo.fk_estudiante = estudiante.ID WHERE listagrupo.ID = '$id_lista_grupo'";
    $resultado_select = mysqli_query($conexion, $results_select);
    $fila = mysqli_fetch_assoc($resultado_select);
    $id_estudiante = $fila['ID'];
    return $id_estudiante;
}
// guardar codigo en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $IDLISTAGRUPO = $_GET['IDLISTAGRUPO']; 
    $Observacion=$_GET['observacion'];
    $codigo = $_GET['codigo'];
    $fecha= date('Y-m-d');
    $MATERIAID=$_GET['materiaid'];
    $id=0;
    require_once ('../BD/conection.php');
        // Realizar la consulta
    $consulta = "SELECT codigo.codigo FROM codigo WHERE codigo.fk_grupo = '$MATERIAID' AND
	codigo.fechahora = '$fecha'";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si la consulta trajo algún dato
    if (mysqli_num_rows($resultado) > 0) {
        // La consulta trajo al menos un dato

        // Obtener la primera fila de resultados en un arreglo asociativo
        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

        // Verificar si el primer dato coincide con el valor deseado
        if ($fila['codigo'] == $codigo) {
            // El primer dato coincide con el valor deseado

               // Realizar la inserción en la tabla asistencia
            $results_insert = "INSERT INTO `asistencia` (`codigo`, `fechahora`, `observacion`, `fk_listagrupo`) 
            VALUES ('$codigo', '$fecha', '$Observacion', '$IDLISTAGRUPO')";
            // Ejecutar la consulta de inserción
            $resultado_insert = mysqli_query($conexion, $results_insert);
            $id = obtener_id_estudiante($IDLISTAGRUPO, $conexion);
            // hacer algo con el ID del estudiante

            
            echo '<h1 class="text-4xl block text-center font-bold">Fecha  '.$fecha.' </h1>
            <h1 class="text-4xl block text-center font-bold">Codigo  '.$codigo.' </h1>';
            echo           '  <h1 class="text-4xl block text-center font-bold"></h1>
            <div class="mt-5 flex items-center">';
            echo '<a href="panelEstudiante.php?ID=' . $id . '" class="text-center w-full border-2 border-red-700 bg-red-700 text-white py-1 rounded-md hover:bg-transparent hover:text-red-700 font-semibold">Terminar</a>';
        } else {
            // El primer dato no coincide con el valor deseado
            $id = obtener_id_estudiante($IDLISTAGRUPO, $conexion);
            echo '<h1 class="text-4xl block text-center font-bold">Codigo incorrecto   </h1>';
            echo            '<h1 class="text-4xl block text-center font-bold"></h1>
            <div class="mt-5 flex items-center">';
            echo '<button onclick="history.back()" class="text-center w-full border-2 border-red-700 bg-red-700 text-white py-1 rounded-md hover:bg-transparent hover:text-red-700 font-semibold">Terminar</button>';
        }

    } else {
        // La consulta no trajo ningún dato
        echo "La consulta no trajo ningún dato";
    }

 }
?>



            </div>
        </div>
   </section>
       
    
</main>

<?php include("../plantillas/footer.php"); ?>