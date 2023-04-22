<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background-image: url("src/fondo3.svg");
        }
    </style>
    <title>Login</title>
</head>
<body class="bg-no-repeat bg-left-top bg-cover" >
    <!-- Cabezera -->
    <header>
        <nav class="fixed top-0 w-full rigth-0 bg-gray-800 ">
            <div class="hidden sm:ml-6 sm:block p-2">
                <div class="flex space-x-4">
                    <a href="#" class="bg-gray-900 text-white rounded-md p-3 text-xl font-bold	"
                        aria-current="page">Sistema de Asistencia </a>
                </div>
            </div>
        </nav>
    </header>



    <!--login -->
    <main class="">
    <form action="validar.php" method="POST" name='login' class="flex justify-center items-center h-screen">
            <div class="w-96 p-3 shadow-lg bg-white rounded-md">
                <h1 class="text-4xl block text-center font-bold"><i class="fa-solid fa-user"></i> Login</h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <label for="username" class="block text-base mb-2">Usuario</label>
                    <input required type="text" id="username" name="username" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md" placeholder="Usuario..." />
                </div>
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Contraseña</label>
                    <input required type="password" id="password" name="password" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md" placeholder="Contraseña..." />
                </div>
                <div class="mt-5">
                    <button type="submit" class="border-2 border-blue-700 bg-blue-700 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-blue-700 font-semibold"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;Iniciar</button>
                </div>
            </div>
        </form>
    </main>

</body>
</html>
<!--
    Se me revuleve el estómago tan solo pensar en cómo sería mi vida si nos hubiésemos conocido ese maravilloso dia.Creo que no seria feliz sin ti 
-->