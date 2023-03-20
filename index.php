<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="  bg-gray-900  ">
    <header>
        <nav class="bg-gray-800">
            <div class="hidden sm:ml-6 sm:block p-2">
                <div class="flex space-x-4">
                    <a href="#" class="bg-gray-900 text-white rounded-md p-3 text-xl font-bold	"
                        aria-current="page">Sistema de Asistencia </a>

                </div>
            </div>
        </nav>
    </header>



    <!--login -->
    <main class="flex justify-center ">
        <form action="validar.php" class="flex  justify-center w-96 h-80 my-4 bg-gray-800 rounded border   border-slate-600 border-solid  shadow-lg" method="POST" name='login'>

            <section class="p-2 m-2 ">
                    <h1 class="text-white text-4xl text-center m-6 font-bold rounded-md " >Inicio de Sesion</h1>
                <div class="flex justify-between ">
                    <label class="text-white text-lg  " for="username" >Usuario</label>
                    <input id="username" type="text" class="mx-2 m-1 rounded-md px-2" name="username" required="true">
                </div>

                <div class="flex justify-between ">
                    <label class="text-white text-lg" for="password">Contraseña</label>
                    <input type="password" id="password" class=" mx-2 m-1 rounded-md px-2" name="password" required="true">
                </div>
            
                <div class="flex justify-center items-center">
                    <button name="login" type="submit" class="bg-purple-800 w-36 text-lg	hover:bg-purple-500 text-white rounded-xl  py-2  font-medium m-3" onclick="">Iniciar</button>
                </div>
            </section>

        </form>

    </main>
    
    <footer class="flex justify-center m-auto bg-gray-800 text-center h-16 fixed bottom-0 left-0 right-0  ">
        <div class=" self-center placeholder:p-4 text-center text-neutral-700 dark:text-neutral-200">
            <a class=" dark:text-neutral-200 " href="mostrarAlert()" >© 2023 Copyright:Raulanto</a>
        </div>
    </footer>

</body>
</html>
<!--
    Se me revuleve el estómago tan solo pensar en cómo sería mi vida si nos hubiésemos conocido ese maravilloso dia.Creo que no seria feliz sin ti 

-->