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
    <title>Grupos</title>
</head>

<body class="bg-gray-900 max-h-max flex flex-col h-full  ">
    <!--Cabezera de la pagina -->
 
    <?php include("cabeza.php"); ?>
    <main class="container m-auto text-center">
        <?php  
        require_once ('BD/conection.php');
        require_once('usuario.php');
        $ID = $_GET['ID'];
        $results = "SELECT ID,nombre,clave FROM asistenciaalumnos.maestro WHERE fk_usuario='$ID'";
        $resultados= mysqli_query($conexion, $results);


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
            echo '<a href="panelMateria.php?ID=' . $ID . '" class="bg-orange-500 hover:bg-orange-600 text-white rounded-full px-3 py-2 text-xl font-medium m-3">Materia</a>';
            echo '<a href="panelMateriasAsistencia.php?ID=' . $ID . '" class="bg-sky-500 hover:bg-sky-600 text-white rounded-full px-3 py-2 text-xl font-medium m-3">Asistencias</a>';
            ?>
        </section>
    </main>


    <footer class="flex justify-center w-full m-auto bg-gray-800 text-center h-16 flex-shrink-0"">
        <div class=" self-center placeholder:p-4 text-center text-neutral-700 dark:text-neutral-200">
            <a class=" dark:text-neutral-200 " href="https://github.com/raulanto/asistencia" >© 2023 Copyright:Raulanto</a>
        </div>
    </footer>

</body>

</html>