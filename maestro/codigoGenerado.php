
<?php 
    $nombre_archivo = basename(__FILE__);

include("../plantillas/header.php"); ?>
<?php

//guardar codigo en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $IDGRUPO = $_GET['IDGRUPO']; 
    $IDMAESTRO = $_GET['IDMAESTRO']; 
    $codigo = $_GET['codigo'];

    require_once ('../BD/conection.php');
    $consulta ="SELECT
        asistencia.ID,
        estudiante.matricula,
        CONCAT( estudiante.nombre, '', estudiante.ape_paterno, '', estudiante.ape_materno ) AS nombre,
        asistencia.codigo 
    FROM
        asistencia
        INNER JOIN listagrupo ON asistencia.fk_listagrupo = listagrupo.ID
        INNER JOIN estudiante ON listagrupo.fk_estudiante = estudiante.ID 
    WHERE
        asistencia.codigo = '$codigo' 
        AND listagrupo.fk_grupo = '$IDGRUPO'";
    $resultado = mysqli_query($conexion, $consulta);


}


// INSERT INTO `codigo`(`codigo`, `fechahora`, `fk_grupo`, `fk_periodo`, `fk_maestro`) VALUES ( 'sdfs', 'werw', 4, 4, 4)
?>

<main class="container m-auto  h-fit my-3">
   <section class="flex justify-center items-start h-fit mt-4">
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
   <section class="container px-4 mx-auto">
            <div class="flex flex-col mt-6">
                <div class="mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead class="bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class=" w-5 px-5 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            ID 
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Nombre
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Codigo</th>

                                    </tr>

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>

    <?php while ($columna = mysqli_fetch_array($resultado)): ?>
    <tr>
        <td class="px-2 py-2 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-center font-medium text-gray-800 dark:text-white"><?= $columna['ID'] ?></h2>
            </div>
        </td>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['matricula'] ?></h2>
            </div>
        </td>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['nombre'] ?></h2>
            </div>
        </td>
    </tr>
<?php endwhile; ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
    
</main>

<?php include("../plantillas/footer.php"); ?>