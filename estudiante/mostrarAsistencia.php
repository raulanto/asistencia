<?php
$nombre_archivo = basename(__FILE__);
include('../plantillas/header.php');
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $IDLISTAGRUPO = $_GET['ID']; 
    $ID=$_GET['estudiante'];

    require_once ('../BD/conection.php');
        $results ="SELECT
    asistencia.ID,    
    asistencia.codigo, 
    asistencia.fechahora,
    asistencia.observacion 
    FROM
        asistencia
        INNER JOIN listagrupo ON asistencia.fk_listagrupo = listagrupo.ID
        INNER JOIN estudiante ON listagrupo.fk_estudiante = estudiante.ID 
    WHERE
        listagrupo.fk_estudiante = '$ID' 
        AND listagrupo.ID = '$IDLISTAGRUPO'";

        $resultados= mysqli_query($conexion, $results);

 }


?>

<section class="container px-4 mx-auto w-full my-4">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-fit py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-fit divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="w-5 px-5 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            No
                                        </th>
                                        <th scope="col"
                                            class="w-5 px-5 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="w-20 px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Codigo</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Fecha y Hora</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Observacion</th>    

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>
    <?php $dato=1; ?>
<?php while ($columna = mysqli_fetch_array($resultados)): ?>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $dato++ ?></h2>
            </div>
        </td>

        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['ID'] ?></h2>
            </div>
        </td>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['codigo'] ?></h2>
            </div>
        </td>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['fechahora'] ?></h2>
            </div>
        </td>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['observacion'] ?></h2>
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
<?php 
    $nombre_archivo = basename(__FILE__);
    include("../plantillas/footer.php"); 
?>

