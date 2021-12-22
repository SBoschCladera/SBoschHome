<?php

include_once "Database.php";

$dbo = new database();
session_start();

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    header("Location: firstPage.php");
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
            box-shadow: 0 0 10px #b4b4b4;
        }

        .nombre {
            position: relative;
            text-align: center;
            top: 40px;
            left: 85px;
            font-size: 25px;
            color: orangered;
        }

        .user {
            position: relative;
            text-align: center;
            top: 150px;
            left: 40px;
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
        <label class="nombre">REGISTRARSE</label>

        <input name="email" type="text" class="user" placeholder="Correo electrónico">
        <br><br>
        <input name="contrasenya" type="password" class="passwd" placeholder="Contraseña">
        <br><br>

        <input type="submit" value="Registrar" class="iniciar">

        <?php

        if (isset($_POST["email"]) && $_POST["email"] != "" &&
            isset($_POST["password"]) && $_POST["password"] != "")

            if ($_POST["password"] == $_POST["password2"]) {
                $dbo->insertUsuario($usuarioid["usuarioId"], $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT));
                $_SESSION["loggedIn"] = true;
                $_SESSION["user_id"] = $dbo->getUsuario($_POST["email"]);
                header("Location: firstPage.php");

            } else {
                echo "<script>
            alert('Las contraseñas no coinciden');
           </script>";
            }
        ?>

    </form>
</div>

</body>
</html>