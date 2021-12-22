<?php

include_once "Database.php";

$dbo = new database();
session_start();

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    header("Location: index.php");
}


$filterBy = isset($_GET["filterBy"]) ? strval($_GET["filterBy"]) : "";
$usuarioid = null;
$email = isset($_POST["email"]) ? strval($_POST["email"]) : "";
$password = isset($_POST["contrasenya"]) ? strval($_POST["contrasenya"]) : "";


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>

        body {
            background: #111 !important;
        }

        .contenedor {
            width: 350px;
            height: 400px;
            margin: auto;
            margin-top: 8%;
            background: #222;
            border: 1px solid #dd2476;
            border-radius: 5px;
            color: rgba(250, 250, 250, 0.8);
        }

        .nombre {
            position: relative;
            text-align: center;
            top: 25px;
            left: 140px;
            font-size: 25px;
            color: orangered;
        }

        .user {
            position: relative;
            text-align: center;
            top: 150px;
            right: 40px;
            width: 260px;
            height: 40px;
            border-radius: 30px;
        }

        .passwd {
            position: relative;
            text-align: center;
            top: 160px;
            left: 40px;
            width: 260px;
            height: 40px;
            border-radius: 30px;
        }


        .iniciar {
            position: relative;
            text-align: center;
            top: 170px;
            left: 40px;
            width: 270px;
            height: 60px;
            font-size: 18px;
            border-radius: 30px;
            background: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
        }

    </style>
</head>
<body>


<div class="contenedor">

    <!-- Se va a procesar en login.php y se enviará por POST, no por GET-->
    <form action="firstPage.php" method="post">
        <label class="nombre">LOGIN</label>

        <input name="usuario" type="text" class="user" placeholder="Nombre de usuario">
        <br><br>
        <input name="palabra_secreta" type="password" class="passwd" placeholder="Contraseña">
        <br><br>

        <input type="submit" value="Iniciar sesión" class="iniciar">
    </form>

    <?php

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    if (isset($email) && isset($password) && $dbo->comprobarUsuario($email, $password)) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["user_id"] = $dbo->selectUserId($email);
        header("Location: firstPage.php");

    } else if (isset($email) && isset($password) && $email != "" && $password != "") {
        echo "<script>
                            alert('Usuario incorrecto');             
              </script>";
    }
    ?>

</div>

</body>
</html>