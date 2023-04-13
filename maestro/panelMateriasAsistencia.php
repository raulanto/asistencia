<?php     $nombre_archivo = basename(__FILE__);
include("../plantillas/header.php"); ?>


    <main class="container m-auto  h-screen">
        <?php  
        require_once ('../BD/conection.php');
        if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
            $results = "select g.ID,g.clave,m.nombre as 'materia',p.nombre 'periodo',c.nombre as 'carrera' from grupo g 
            inner join materia m on g.fk_materia=m.ID
            inner join periodo p on g.fk_periodo=p.ID
            inner join carrera c on g.fk_carrera=c.ID WHERE g.fk_maestro='$ID'";
            $resultados= mysqli_query($conexion, $results);
        } else {
            echo "El parámetro ID no está definido";
        }



    ?>
        <section class="container px-4 mx-auto">
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            ID
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Materia</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Periodo</th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 dark:text-gray-400">
                                            Asistencia</th>
                                    </tr>

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>

                                    <?php while ($columna = mysqli_fetch_array($resultados)): ?>
    <tr>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['ID'] ?></h2>
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
        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
            <div class="inline px-3 py-1 font-normal rounded-full text-center text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800 hover:dark:bg-gray-700">
                <a class="text-center" href="panelAsistencia.php?ID=<?= $columna['ID'] ?>">Lista</a>
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