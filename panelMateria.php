<?php include("header.php"); ?>



    <main class="class="container m-auto  h-full">
        <?php  
        require_once ('BD/conection.php');
        if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
            $results = "SELECT
            g.ID,
            g.clave,
            m.nombre AS materia,
            p.nombre AS periodo,
            c.nombre AS carrera,
            p.ID AS id_periodo,
            maestro.nombre AS nombreM 
        FROM
            grupo AS g
            INNER JOIN materia AS m ON g.fk_materia = m.ID
            INNER JOIN periodo AS p ON g.fk_periodo = p.ID
            INNER JOIN carrera AS c ON g.fk_carrera = c.ID
            INNER JOIN maestro ON g.fk_maestro = maestro.ID 
        WHERE
            g.fk_maestro =  '$ID'";
            $resultados= mysqli_query($conexion, $results);
        } else {
            echo "El parámetro ID no está definido";
        }



    ?>
        <section class="container px-4 mx-auto ">
        <button onclick="history.back()" class="text-center mt-5 px-3 w-34 border-2 border-red-700 bg-red-700 text-white py-1  rounded-md hover:bg-transparent hover:text-red-700 font-semibold">Regresar</button>
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
                                            clave
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Materia</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Periodo</th>


                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Carrera</th>


                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 dark:text-gray-400">
                                            Grupo</th>
                                            <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 dark:text-gray-400">
                                            Tomar Asistencia</th>

                                    </tr>

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>

                                        <?php
while ($columna = mysqli_fetch_array($resultados)) {
            echo '<td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                <div>
                    <h2 class="text-center font-medium text-gray-800 dark:text-white">' . $columna['ID'] . '</h2>
                </div>
            </td>
            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                <div>
                    <h2 class="text-left font-medium text-gray-800 dark:text-white">' . $columna['clave'] . '</h2>
                </div>
            </td>
            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                <div>
                    <h2 class="text-left font-medium text-gray-800 dark:text-white">' . $columna['materia'] . '</h2>
                </div>
            </td>
            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                <div>
                    <h2 class="text-left font-medium text-gray-800 dark:text-white">' . $columna['periodo'] . '</h2>
                </div>
            </td>
            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
            <div>
                <h2 class="text-left font-medium text-gray-800 dark:text-white">' . $columna['carrera'] . '</h2>
            </div>
        </td>
        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
            <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800 hover:dark:bg-gray-700 ">
                <a href="panelLista.php?ID=' . $columna['ID'] . '">Lista</a>
            </div>
        </td>
        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
        <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800 hover:dark:bg-gray-700 ">
            <a href="asistenciaTomar.php?IDgrupo=' . $columna['ID'] . '&IDmaestro='.$ID.'&IDperiodo='.$columna['id_periodo'].  '&periodo='.$columna['periodo'] .'&materia='. $columna['materia'].'&nombremaestro='.$columna['nombreM'].'">Tomar asistencia</a>
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


    </main>

    <?php include("footer.php"); ?>
