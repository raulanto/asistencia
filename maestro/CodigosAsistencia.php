<?php     $nombre_archivo = basename(__FILE__);
include("../plantillas/header.php"); ?>

<main class="container m-auto  h-fitt mt-4">
    <?php  
        require_once ('../BD/conection.php');
        if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
            $results = "SELECT
            asistencia.ID,
            asistencia.codigo,
            asistencia.fechahora,
            COUNT( asistencia.fk_listagrupo ) AS cantidad
        FROM
            asistencia
            INNER JOIN listagrupo ON asistencia.fk_listagrupo = listagrupo.ID 
        WHERE
            listagrupo.fk_grupo = '$ID' 
        GROUP BY
            asistencia.codigo 
        ORDER BY
            asistencia.fechahora ASC";
            $resultados= mysqli_query($conexion, $results);
        } else {
            echo "El parámetro ID no está definido";
        }

    ?>

<section class="container px-4 mx-auto">

<div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-fit py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
            <table class="min-w-fit divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col"
                            class="w-5 px-5 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            ID
                        </th>
                        <th scope="col"
                            class="w-20 px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Codigo</th>
                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Fecha</th>
                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 dark:text-gray-400">
                            <i class="fa-solid fa-chart-simple"></i>
                            Cantidad</th>
                            <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 dark:text-gray-400">
                            <i class="fa-solid fa-chart-simple"></i>
                            Mostrar</th>

                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                    <tr>


                        <?php while ($columna = mysqli_fetch_array($resultados)): ?>
                    <tr>
                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                            <div>
                                <h2 class="text-left font-medium text-gray-800 dark:text-white">
                                    <?= $columna['ID'] ?>
                                </h2>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                            <div>
                                <h2 class="text-left font-medium text-gray-800 dark:text-white">
                                    <?= $columna['codigo'] ?>
                                </h2>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                            <div>
                                <h2 class="text-left font-medium text-gray-800 dark:text-white">
                                    <?= $columna['fechahora'] ?>
                                </h2>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                            <div>
                                <h2 class="text-left font-medium text-gray-800 dark:text-white">
                                    <?= $columna['cantidad'] ?>
                                </h2>
                            </div>
                        </td>
                        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                            <div
                                class="inline px-3 py-1 font-normal rounded-full text-center text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800 hover:dark:bg-gray-700">
                                <a class="text-center"
                                    href="codigoAsistenciaAlumnos.php?IDgrupo=<?= $ID?>  &codigo=<?=$columna['codigo']?>">Mostrar</a>
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





<?php     $nombre_archivo = basename(__FILE__);
include("../plantillas/footer.php"); ?>