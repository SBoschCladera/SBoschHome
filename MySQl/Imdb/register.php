<?php
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
            left: 85px;
            font-size: 25px;
            color: orangered;
        }

        .user {
            position: relative;
            text-align: center;
            top: 100px;
            left: 80px;
            height: 30px;
        }

        .passwd {
            position: relative;
            text-align: center;
            top: 120px;
            left: 80px;
            height: 30px;
        }

        .iniciar {
            position: relative;
            text-align: center;
            top: 180px;
            left: 110px;
            height: 40px;
            font-size: 18px;
            border-radius: 5px;
            background: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
        }

    </style>
</head>
<body>


<div class="contenedor">

    <!-- Se va a procesar en login.php y se enviará por POST, no por GET-->
    <form action="login.php" method="post">
        <label class="nombre">REGISTRARSE</label>

        <input name="usuario" type="text" class="user" placeholder="Escribe tu nombre de usuario">
        <br><br>
        <input name="palabra_secreta" type="password" class="passwd" placeholder="Contraseña">
        <br><br>

        <input type="submit" value="Iniciar sesión" class="iniciar">
    </form>
</div>

</body>
</html>