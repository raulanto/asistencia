<?php     $nombre_archivo = basename(__FILE__);
include("../plantillas/header.php"); ?>

<main class ="container m-auto  h-fitt mt-4">
    <?php  
    //mostrar los alumnos por codigo
        require_once ('../BD/conection.php');
        if (isset($_GET['IDgrupo'])) {
            $ID = $_GET['IDgrupo'];
        
            $codigo = $_GET['codigo'];
            $results = "SELECT
            asistencia.ID,
            estudiante.matricula,
            CONCAT( estudiante.nombre, ' ', estudiante.ape_paterno, ' ', estudiante.ape_materno ) AS nombre,
            asistencia.codigo 
            FROM
                asistencia
                INNER JOIN listagrupo ON asistencia.fk_listagrupo = listagrupo.ID
                INNER JOIN estudiante ON listagrupo.fk_estudiante = estudiante.ID 
            WHERE
                asistencia.codigo =  '$codigo'
                AND listagrupo.fk_grupo = '$ID'";
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
                                Matricula</th>
                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Nombre</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">


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
                                        <?= $columna['matricula'] ?>
                                    </h2>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                <div>
                                    <h2 class="text-left font-medium text-gray-800 dark:text-white">
                                        <?= $columna['nombre'] ?>
                                    </h2>
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
