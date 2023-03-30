<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['username'];
        $password = $_POST['password'];

        require_once ('BD/conection.php');

        $consulta = mysqli_query($conexion,"select ID ,fk_rol from usuario where username='$nombre'  AND password=aes_encrypt('root' ,'$password')");

        if(!$consulta){ 
            // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
            echo mysqli_error($mysqli);
            // si la consulta falla es bueno evitar que el código se siga ejecutando
            exit;
        } 
        if($user = mysqli_fetch_assoc($consulta)) {
            $_SESSION['logueado'] = true;
            $CLAVEMAESTRO=$user['ID'];
            if ($user['fk_rol']==1) {
                header("Location: maestro/panelMaestro.php?ID=".$CLAVEMAESTRO);
                exit;

            }else{
                header("Location: estudiante/panelEstudiante.php?ID=".$CLAVEMAESTRO);
                exit;
            }
        }else {
            header("Location: incorrecto.php");
        }
    }

?>