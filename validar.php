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

        $consulta = mysqli_query($conexion,"select ID from usuario where username='$nombre'  AND password=aes_encrypt('root' ,'$password')");

        if(!$consulta){ 
            // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
            echo mysqli_error($mysqli);
            // si la consulta falla es bueno evitar que el código se siga ejecutando
            exit;
        } 
        if($user = mysqli_fetch_assoc($consulta)) {
            header("Location: panelMaestro.php?ID=".$user['ID']);
            exit;
        }else {
            header("Location: login.php");
        }
    }

?>