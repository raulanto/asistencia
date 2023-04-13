<?php     $nombre_archivo = basename(__FILE__);
 include("../plantillas/header.php"); ?>



    <main class="class="container m-auto  h-full">
        <?php  
        require_once ('../BD/conection.php');
        if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
            $results = "SELECT
            listagrupo.ID ,
            grupo.clave,
            materia.nombre AS materia,
            periodo.nombre AS periodo,
            maestro.nombre AS maestro 
        FROM
            listagrupo
            INNER JOIN grupo ON listagrupo.fk_grupo = grupo.ID
            INNER JOIN materia ON grupo.fk_materia = materia.ID
            INNER JOIN periodo ON grupo.fk_periodo = periodo.ID
            INNER JOIN maestro ON grupo.fk_maestro = maestro.ID 
        WHERE
            listagrupo.fk_estudiante = '$ID'";
            $resultados= mysqli_query($conexion, $results);
        } else {
            echo "El parámetro ID no está definido";
        }



    ?>
        <section class="container px-4 mx-auto h-screen">
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class=" w-5 px-5 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            ID
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Clave
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Materia</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Periodo</th>


                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Maestro
                                        </th>
                                            <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 dark:text-gray-400">
                                            
                                            Opciones</th>
                                            </th>


                                    </tr>

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>

                                    <?php
while ($columna = mysqli_fetch_array($resultados)) {
    ?>
    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
        <div>
            <h2 class="text-center font-medium text-gray-800 dark:text-white"><?= $columna['ID'] ?></h2>
        </div>
    </td>
    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
        <div>
            <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['clave'] ?></h2>
        </div>
    </td>
    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
        <div>
            <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['materia'] ?></h2>
        </div>
    </td>
    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
        <div>
            <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['periodo'] ?></h2>
        </div>
    </td>
    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
        <div>
            <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['maestro'] ?></h2>
        </div>
    </td>
    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap flex justify-center">
        <div class="inline px-3 py-1 text-sm  rounded-l-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800 hover:dark:bg-gray-700 font-semibold">
        <i class="fa-sharp fa-solid fa-pencil"></i>
            <a href="tomarAsistenciaEstudiante.php?ID=<?= $columna['ID'] ?>&materia=<?= $columna['materia'] ?>&estudiante=<?= $ID ?>">Tomar asistencia</a>
        </div>
        <div class="inline px-3 py-1 text-sm  rounded-r-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800 hover:dark:bg-gray-700 font-semibold">
        <i class="fa-solid fa-eye"></i>
            <a href="mostrarAsistencia.php?ID=<?= $columna['ID'] ?>&estudiante=<?= $ID ?>">Mostrar Asistencia</a>
        </div>
    </td>
    <?php
}
?>
</tr>

                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <?php include("../plantillas/footer.php"); ?>
