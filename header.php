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
<header>
        <nav class="bg-gray-800 ">
            <div class="hidden sm:ml-6 sm:block p-2">
                <div class="flex space-x-4 justify-between items-center">
                <!-- <?php
                    echo '<a href="panelMaestro.php?ID=' . $CLAVEMAESTRO . '" class="bg-gray-900 text-white rounded-md p-3 text-xl font-bold hover:bg-gray-700 hover:text-white" aria-current="page">Sistema de Asistencia</a>';
                ?> -->
<a href="#" class="bg-gray-900 text-white rounded-md p-3 text-xl font-bold hover:bg-gray-700 hover:text-white" aria-current="page">Sistema de Asistencia</a>
                        <a href="close.php"
                        class="text-red-300 hover:bg-red-700 hover:text-white rounded-md p-3 text-lg font-medium">Salir</a>
                </div>
            </div>
        </nav>
</header>



