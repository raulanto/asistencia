<?php     
    session_start();
    if(!$_SESSION['logueado']==true){
        header("Location:index.php");
    } 

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Materias</title>
</head>

<body class="bg-gray-900">
    <!--Cabezera de la pagina -->
    <header>
        <nav class="bg-gray-800 ">
            <div class="hidden sm:ml-6 sm:block p-2">
                <div class="flex space-x-4">
                    <a href="#"
                        class="bg-gray-900 text-white rounded-md p-3 text-xl font-bold hover:bg-gray-700 hover:text-white	"
                        aria-current="page">Sistema de Asistencia </a>
                    <a href="close.php"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md p-3 text-lg font-medium">Salir</a>
                </div>
            </div>
        </nav>
    </header>


    <main class="container m-auto text-center">
        <?php  
        require_once ('BD/conection.php');
        if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
            $results = "SELECT materia.nombre AS materia,estudiante.ID,CONCAT( estudiante.nombre, ' ', estudiante.ape_paterno, ' ', ape_materno ) AS nombre,COUNT( listagrupo.fk_estudiante ) AS Asistencias FROM asistencia INNER JOIN listagrupo ON asistencia.fk_listagrupo = listagrupo.ID INNER JOIN estudiante ON listagrupo.fk_estudiante = estudiante.ID INNER JOIN grupo ON listagrupo.fk_grupo = grupo.ID INNER JOIN materia ON grupo.fk_materia = materia.ID 
        WHERE
            grupo.ID = '$ID' 
        GROUP BY
            estudiante.ID";
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
                                            Nombre</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Asistencia</th>

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>

                                        <?php
while ($columna = mysqli_fetch_array($resultados)) {
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
                    <h2 class="text-left font-medium text-gray-800 dark:text-white">' . $columna['Asistencias'] . '</h2>
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


    <footer class="flex justify-center m-auto bg-gray-800 text-center h-16 fixed bottom-0 left-0 right-0  ">
        <div class=" self-center placeholder:p-4 text-center text-neutral-700 dark:text-neutral-200">
            <a class=" dark:text-neutral-200 " href="">© 2023 Copyright:Raulanto</a>
        </div>
    </footer>

</body>

</html>