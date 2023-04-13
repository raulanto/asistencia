<!--
    Panel Lista
    -Mostrar la lista de los alumnos por materia

-->

<?php 
$nombre_archivo = basename(__FILE__);
include("../plantillas/header.php"); 
?>

    <main class="container m-auto  mt-3 h-full">
        <?php  
        require_once ('../BD/conection.php');
        if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
            $results = "SELECT estudiante.ID, estudiante.matricula, estudiante.nombre, estudiante.ape_paterno, estudiante.ape_materno, materia.nombre AS 'materia' FROM listagrupo INNER JOIN grupo ON  listagrupo.fk_grupo = grupo.ID INNER JOIN materia ON  grupo.fk_materia = materia.ID INNER JOIN estudiante ON  listagrupo.fk_estudiante = estudiante.ID WHERE listagrupo.fk_grupo='$ID'";
            $resultados= mysqli_query($conexion, $results);
            $columna = mysqli_fetch_array($resultados);
            echo     '<div class="">
            <div>
                <div scope="col"
                    class="px-12 py-3.5 text-2xl text-center rtl:text-right text-white font-bold">
                    '.$columna['materia'].
                '</div>            
            </div>
        </div>';
        } else {
            echo "El parámetro ID no está definido";
        }

    ?>
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
                                            Matricula
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Nombre</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Apellido Paterno</th>


                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Apellido Materno</th>

                                    </tr>

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>

                                    <?php while ($columna = mysqli_fetch_array($resultados)): ?>
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
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['ape_paterno'] ?></h2>
            </div>
        </td>
        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white"><?= $columna['ape_materno'] ?></h2>
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
