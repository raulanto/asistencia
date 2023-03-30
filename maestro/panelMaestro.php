<!--
    Panel Maestro
        -Datos del maestro
        -Materia
        -Asistencia

-->
    <!--Cabezera de la pagina -->
    <?php
    $nombre_archivo = basename(__FILE__);
    include("../plantillas/header.php"); ?>
    <?php  
        require_once ('../BD/conection.php');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $ID = $_GET['ID'];
            $CLAVEMAESTRO = $_GET['ID'];
          } else {
            echo 'no se esta usando';
          }
        $results = "SELECT ID,nombre,clave FROM maestro WHERE fk_usuario='$CLAVEMAESTRO'";
        $resultados= mysqli_query($conexion, $results);


    ?>
    <main class="container m-auto text-center  h-screen ">

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
                                            Profesor
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Clave</th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>

                                        <?php
while ($columna = mysqli_fetch_array($resultados)) {
    $ID=$columna['ID'];
    echo '<td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
        <div>
            <h2 class="text-left font-medium text-gray-800 dark:text-white">' . $columna['ID'] . '</h2>
        </div>
    </td>
    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
        <div>
            <h2 class="text-left font-medium text-gray-800 dark:text-white">' . $columna['nombre'] . '</h2>
        </div>
    </td>
    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
        <div>
            <h2 class="text-left font-medium text-gray-800 dark:text-white">' . $columna['clave'] . '</h2>
        </div>
    </td>';
    ?>
                                    </tr>
                                    <?php }?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="m-5">
            <?php
            echo '<a href="panelMateria.php?ID=' . $ID . '" class="bg-orange-500  hover:bg-orange-600 text-white rounded-full px-3 py-2 text-xl font-medium m-3">Materia</a>';
            echo '<a href="panelMateriasAsistencia.php?ID=' . $ID . '" class="bg-sky-500 hover:bg-sky-600 text-white rounded-full px-3 py-2 text-xl font-medium m-3">Asistencias</a>';
            
            ?>
        </section>
    </main>
    <!--Pie de pagina-->
    <?php include("../plantillas/footer.php"); ?>
    
