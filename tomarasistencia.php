<?php
session_start();
$var_grupo = $_GET['ID_listagrupo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body {
        background-image: url('assets/mon.jpg');
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
    <!-- Bootstrap core CSS -->
<link href=" css/bootstrap.min.css " rel=" stylesheet " >

</head>
<body>
    
<a href="cerrarsesion.php" class = "text-white" >Cerrar Sesion</a><br>
<center>
    <style>
            h1 {color: white; }
            </style>
<h1>TOMAR ASISTENCIA</h1>
<center>

<body class="text-center">


<main class="form-signin w-100 m-auto">
    <form action="grabarcodigo.php" method="POST">
        <h1 class="h3 mb-3 fw-normal text-white"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ingresa asistencia</font></font></h1>

        <div class="form-container">
            <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-sm" name="usuario" id="floatingInput">
                <label class="text-center" for="floatingInput">Codigo</label>
            </div>
            <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control form-control-sm" name="da" id="floatingPassword" placeholder="Contraseña">
                <label class="text-center" for="floatingPassword">fecha hora</label>
            </div>
            <input type="text" class="form-control form-control-sm" name="da" id="floatingPassword" value="<?php echo $var_grupo?>">
                <label class="text-center" for="floatingPassword">grupo</label>
        </div>
        <div>
        <input type="text" class="form-control form-control-sm" name="da" id="floatingPassword" >
                <label class="text-center" for="floatingPassword">periodo</label>
    </div>
    <div>
    <input type="text" class="form-control form-control-sm" name="da" id="floatingPassword" >
                <label class="text-center" for="floatingPassword">maestro</label>
    </div>

        <button class="w-100 btn btn-lg btn-success" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Iniciar sesión</font></font></button>
        <p class="mt-5 mb-3 text-muted text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2023</font></font></p>
    </form>
    </main>
</body>
</html>