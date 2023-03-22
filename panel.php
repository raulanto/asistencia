<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-900">
    <!--Cabezera de la pagina -->
    <header>
        <nav class="bg-gray-800 ">
            <div class="hidden sm:ml-6 sm:block p-2">
                <div class="flex space-x-4">
                    <a href="#" class="bg-gray-900 text-white rounded-md p-3 text-xl font-bold hover:bg-gray-700 hover:text-white	"
                        aria-current="page">Sistema de Asistencia </a>
                    <a href="login.php"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md p-3 text-lg font-medium">Login</a>
                </div>
            </div>
        </nav>
    </header>

    
    <div class="flex justify-center items-center bg-gradient-to-r mb-3 h-32 from-green-400 to-blue-500 m-0   ">
        <h1 class="text-6xl  font-bold  text-white  text-center font-sans ">Sistema Asistencia</h1>
   </div>
    <main class="container m-auto text-center">

        <section class="m-5">
            <a href="panelEstudiante.html"
                class="bg-orange-500 	hover:bg-orange-600 text-white rounded-full  px-3 py-2 text-xl font-medium m-3">
                Estudiante
            </a>
            <a href="panelMaestro"
                class="bg-lime-500	hover:bg-lime-600 text-white rounded-full px-3 py-2 text-xl font-medium m-3" >Maestro</a>
            <a href="panelAdmon "
                class="bg-purple-500	hover:bg-purple-600 text-white rounded-full px-3 py-2 text-xl font-medium m-3">Administrador</a>
        </section>
    </main>

    
    <footer class="flex justify-center m-auto bg-gray-800 text-center h-16 fixed bottom-0 left-0 right-0  ">
        <div class=" self-center placeholder:p-4 text-center text-neutral-700 dark:text-neutral-200">
            <a class=" dark:text-neutral-200 " href="https://github.com/raulanto/asistencia" >© 2023 Copyright:Raulanto</a>
        </div>
    </footer>
</body>
</html>