<html lang="es">
<head>
    <title>How secure is your password</title>
    <style>
        body{
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


    function contarCaracteres($pass){

       $pass = intval($_POST["pass"]);
       return mb_strlen($pass)."<br>";
    }

    function colorFondo(){

        $pass = intval($_POST["pass"]);
        $numDigitos = mb_strlen($pass);

           if ($numDigitos > 0 && $numDigitos <= 4) {
               echo '<body style="background-color:#cc0000">';
           } else if ($numDigitos > 4 && $numDigitos <= 8) {
               echo '<body style="background-color:darkorange">';
           } else if ($numDigitos > 8 && $numDigitos <= 15) {
               echo '<body style="background-color:yellow">';
           } else if($numDigitos >15){
               echo '<body style="background-color:green">';
           }
      //  echo contarCaracteres($pass)."<br>";
    }

    function compararArray($pass){

       $passwordsUsados = array("123456", "123456789.", "qwerty", "password", "12345", "qwerty123", "1q2w3e", "12345678", "111111", "1234567890");

           for ($i = 0; $i < 10;$i++){
                 if($passwordsUsados[$i] != $pass){
                 } else {
                     echo "Esta contraseña se encuentra entre las 10 más usadas del año 2020"."<br>";
                 }
           }
    }

    function calcularTiempo($pass){

        $pass = intval($_POST["pass"]);
        $numDigitos = mb_strlen($pass);
        return pow(256, $numDigitos);
    }

    function calculoMinutos($pass){
         return calcularTiempo($pass) / 60;
    }
    function restoSegundos($pass){
        return calcularTiempo($pass) % 60;
    }
    function calculoHoras($pass){
        return calculoMinutos($pass) / 60;
    }
    function calculoDias($pass){
        return calculoHoras($pass) / 7;
    }
    function calculoSemanas($pass){
        return calculoDias($pass) / 7;
    }
    function calculoMeses($pass){
        return calculoDias($pass) / 30;
    }
    function calculoAnyos($pass){
        return calculoDias($pass) / 365;
    }

    function mostrarTiempoCrackeo($pass){

        echo calcularTiempo($pass)." segundos"."<br>";
        echo calculoMinutos($pass)." minutos"."<br>";
        echo calculoHoras($pass)." horas"."<br>";
        echo calculoDias($pass)." dias"."<br>";
        echo calculoSemanas($pass)." semanas"."<br>";
        echo calculoMeses($pass)." meses"."<br>";
        echo calculoAnyos($pass)." años"."<br>";

    }



    if (isset($_POST["pass"])) {
    $pass = intval($_POST["pass"]);

      echo contarCaracteres($pass);
      echo colorFondo();
      echo compararArray($pass);
      echo mostrarTiempoCrackeo($pass);


    }


    ?>
</div>
    </body>
</html>