
<?php     $nombre_archivo = basename(__FILE__);
include("../plantillas/header.php"); ?>


<?php


//Sacar datos de La materia
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $IDLISTAGRUPO = $_GET['ID']; 
    $ID=$_GET['estudiante'];
    $materia=$_GET['materia'];

 }


?>


<main class="">
    <!--
               formulario Para generar el codigo de asistencia
            -->
    <form class="flex justify-center items-center h-screen" action="presente.php" method="get">
        <div class="w-96 p-3 shadow-lg bg-white rounded-md">
            <h1 class="text-4xl block text-center font-bold"> Tomar Asistencia</h1>
            <h3 class="text-2xl block text-center font-bold">
                <?php echo $materia; ?>
            </h3>
            <hr class="mt-3">
            <div class="mt-3">
                <label for="fecha" class="block text-base mb-2">No de lista</label>
                <input required type="text" id="IDLISTAGRUPO" name="IDLISTAGRUPO" type="hidden"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                    value="<?php echo $IDLISTAGRUPO;  ?>" />
            </div>
            <div class="mt-3">
                <label for="Codigo" class="block text-base mb-2">Codigo</label>
                <input required type="text" id="Codigo" name="codigo" type="hidden"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                    placeholder="codigo..." " />
            </div>
            <div class="mt-3">
                <label for="grupo" class="block text-base mb-2">Observacion</label>
                <input required type="text" id="observacion" name="observacion" type="hidden"
                    class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md"
                    placeholder="Usuario..."  value="virtual" >
            </div>

            <div class="mt-3 flex items-center">
                <button
                    class="text-center border-2 mt-3 border-blue-700 bg-blue-700 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-blue-700 font-semibold" ">Iniciar</button>
            </div>

        </div>

    </form>
</main>

<?php include("../plantillas/footer.php"); ?>