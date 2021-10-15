<html lang="es">
<head>
    <title>How secure is your password</title>
    <style>
        body {
            background-color: #376a82;
        }
    </style>
</head>
<body>
<form method="post" action="how_Secure_Pass.php">
    <label>
        How Secure Is Your Password?
        <input type="text" name="pass"/>
    </label>
    <input type="submit"/>
</form>
<div>

    <?php

    // $pass = intval($_POST["pass"]);

    $operacionesPorSegundo = 1000;

    function contarCaracteres()
    {
        $pass = $_POST["pass"];
        return strlen($pass) . "<br>";
    }

    function colorFondo()
    {

        $pass = $_POST["pass"];
        $numDigitos = strlen($pass);

        if ($numDigitos > 0 && $numDigitos <= 4) {
            echo '<body style="background-color:#cc0000">';
        } else if ($numDigitos > 4 && $numDigitos <= 8) {
            echo '<body style="background-color:darkorange">';
        } else if ($numDigitos > 8 && $numDigitos <= 15) {
            echo '<body style="background-color:yellow">';
        } else if ($numDigitos > 15) {
            echo '<body style="background-color:green">';
        }
    }

    function compararArray($pass)
    {
        $passwordsUsados = array("123456", "123456789.", "qwerty", "password", "12345", "qwerty123", "1q2w3e", "12345678", "111111", "1234567890");
        if (in_array($pass, $passwordsUsados)) {
            echo "Esta contraseña se encuentra entre las 10 más usadas del año 2020" . "<br>";
        } else {
            echo " ";
        }

    }

    function calcularTiempo($pass)
    {

        $pass = $_POST["pass"];
        $numDigitos = strlen($pass);
        return pow(256, $numDigitos);
    }
    function calculoAnyos($pass)
    {
        return floor((calcularTiempo($pass) / 31536000)/ 1000);
    }
    function restAnyos($pass)
    {
        return calcularTiempo($pass) % 31536000;
    }
    function calculoMeses($pass)
    {
        return floor(restAnyos($pass) / 2592000);
    }
    function restoMeses($pass)
    {
        return restAnyos($pass) % 2592000;
    }
    function calculoDias($pass)
    {
        return floor(restoMeses($pass) / 86400);
    }
    function restoDias($pass)
    {
        return restoMeses($pass) % 86400;
    }
    function calculoHoras($pass)
    {
        return floor(restoDias($pass) / 3600);
    }
    function restoHoras($pass)
    {
        return restoDias($pass) % 3600;
    }
    function calculoMinutos($pass)
    {
        return floor(restoHoras($pass) / 60);
    }
    function restoSegundos($pass)
    {
        return calcularTiempo($pass) % 60;
    }



    function mostrarTiempoCrackeo($pass)
    {
        echo calculoAnyos($pass). " años, ". calculoMeses($pass) ." meses, ".calculoDias($pass) . " dias, "  . calculoHoras($pass) ." horas, " . calculoMinutos($pass) . " minutos y " .restoSegundos($pass) . " segundos.";
    }


    if (isset($_POST["pass"])) {
        $pass = $_POST["pass"];
        echo contarCaracteres();
        colorFondo();
        compararArray($pass);
        mostrarTiempoCrackeo($pass);
    }


    ?>
</div>
</body>
</html>