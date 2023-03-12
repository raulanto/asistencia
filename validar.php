<?php
session_start();

    if (isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['username'];
        $password = $_POST['password'];

        require_once ('BD/conection.php');

        $consulta = mysqli_query ($conexion, "SELECT * FROM usuario WHERE username = '$nombre' AND password = '$password'");  


        if(!$consulta){ 
            // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
            echo mysqli_error($mysqli);
            // si la consulta falla es bueno evitar que el código se siga ejecutando
            exit;
        } 
        if($user = mysqli_fetch_assoc($consulta)) {
            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php");
        }
    }

?>