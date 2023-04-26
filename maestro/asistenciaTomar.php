<?php 
$nombre_archivo = basename(__FILE__);
include("../plantillas/header.php"); 
?>


<?php


//Sacar datos de La materia
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $IDGRUPO = $_GET['IDgrupo']; 
    $IDMAESTRO = $_GET['IDmaestro']; 
    $IDPERIODO = $_GET['IDperiodo']; 
    $periodo = $_GET['periodo']; 
    $materia = $_GET['materia'];
    $maestro=$_GET['nombremaestro'];
 }


//Generar el codigo alatorio
$codigo='';
function generarCodigoAleatorio() {
    $codigo = "";
    for ($i = 0; $i < 5; $i++) {
      $tipo = rand(1, 2);
      if ($tipo == 1) { 
        $letra = chr(rand(65, 90)); 
        $codigo .= $letra;
      } else { 
        $numero = rand(0, 9);
        $codigo .= $numero;
      }
    }
    return $codigo;
  }
  $codigo=generarCodigoAleatorio();

  function obtener_fecha_hora_actual() {
    date_default_timezone_set('America/Mexico_City'); // ajusta la zona horaria a la de México
    $fecha_hora_actual = date('Y-m-d '); // formato: AAAA-MM-DD HH:MM:SS
    return $fecha_hora_actual;
  }
  $fecha = obtener_fecha_hora_actual();  

?>


<main class="">

    <!--
        formulario Para generar el codigo de asistencia
    -->
    <form class="flex justify-center items-center h-screen" action="codigoGenerado.php" method="get">
        <div class="w-96 p-3 shadow-lg bg-white rounded-md">
            <h1 class="text-4xl block text-center font-bold"> Tomar Asistencia</h1>
            <h3 class="text-2xl block text-center font-bold">
                <?php echo $materia; ?>
            </h3>
            <hr class="mt-3">
            <div class="mt-3">
                <label for="Codigo" class="block text-base mb-2">Codigo</label>
                <input required type="text" id="Codigo" name="codigo" type="hidden"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                    placeholder="codigo..." value="<?php echo $codigo; ?>" />
            </div>
            <div class="mt-3">
                <label for="fecha" class="block text-base mb-2">Fecha</label>
                <input required type="datetime-local" id="fecha" name="fecha" type="hidden"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                    value="<?php echo $fecha;  ?>" />
            </div>
            <div class="mt-3">
                <label for="grupo" class="block text-base mb-2">Grupo</label>
                <input required type="text" id="grupo" name="IDGRUPO" type="hidden"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                    placeholder="Usuario..." value="<?php echo $IDGRUPO; ?>" />
            </div>
            <div class="mt-3">
                <label for="periodo" class="block text-base mb-2">Periodo</label>
                <input required type="text" id="periodo" name="IDPERIODO" type="hidden"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                    placeholder="Usuario..." value="<?php echo $IDPERIODO ?>" />
            </div>
            <div class="mt-3">
                <label for="maestro" class="block text-base mb-2">Maestro</label>
                <input required type="text" id="maestro" name="IDMAESTRO" type="hidden"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                    placeholder="Usuario..." value="<?php echo $IDMAESTRO ?>" />
            </div>
            <!--
                
            -->

            <div class="mt-3 flex items-center">
                <button
                    class="text-center border-2 mt-3 border-blue-700 bg-blue-700 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-blue-700 font-semibold" ">Iniciar</button>
            </div>

        </div>

    </form>
</main>

<?php include("../plantillas/footer.php"); ?>

