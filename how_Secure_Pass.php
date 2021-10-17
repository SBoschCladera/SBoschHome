<html lang="es">
<head>
    <title>How secure is your password</title>
    <style>
        .submit {
            font-size: 20px;
            font-family: "Comic Sans MS";
            padding: 20px;
            width: 100px;
            text-align: center;
            background-color: lightgray;
        }
        .input{
            background-color: lightgray;
            padding: 20px;
            width: 600px;
        }
        body{
            text-align: center;
            margin-top: 100px;
            font-family: "Comic Sans MS";
            font-size: xxx-large;
            background-color:
        <?php

        function colorFondo($pass){

            $numDigitos = strlen($pass);

            if ($numDigitos > 0 && $numDigitos <= 4) {
                echo "rgb(219, 125, 58)";
            } else if ($numDigitos > 4 && $numDigitos <= 8) {
               echo "rgb(232,145,20)";
            } else if ($numDigitos > 8 && $numDigitos <= 15) {
                echo "rgb(255, 195, 0)";
            } else if ($numDigitos > 15) {
                echo "rgb(55, 130, 65)";
            }
        }
           if(isset($_POST["pass"])) {
                  $pass = ($_POST["pass"]);

                  if ($pass != null) {
                 colorFondo($pass);
                }
             }
        ?>;
    </style>
</head>
<body >
<form method="post" action="how_Secure_Pass.php">
    <label>
        How Secure Is Your Password?.<br>
        <input class= "input" type="text" name="pass"/>
    </label>
    <input class="submit" type="submit"/>
</form>
<div>
     <?php

    function compararArray($pass)
    {
    $passwordsUsados = array("123456", "123456789.", "qwerty", "password", "12345", "qwerty123", "1q2w3e", "12345678", "111111", "1234567890");

    if (in_array($pass, $passwordsUsados)) {

        echo "<div style='display:flex;align-items: center;justify-content: center'>
                <p style='max-width: 800px; max-height: 140px; padding:30px; border: 4px solid black; background-color: lightgray;text-align: center; font-size: 40px';>";

        echo "Esta contraseña se encuentra entre las 10 más usadas del año 2020" . "<br>";
        }
        echo "</p></div>";
    }

    function calcularPosibilidades($pass){

        $pass = $_POST["pass"];
        $numDigitos = strlen($pass);
        return pow(256, $numDigitos);
    }
     function calculoTiempo($pass){

         $tiempo= calcularPosibilidades($pass)/1000;

         $restoSegundos = $tiempo % 60;
         $minutos = floor($tiempo / 60);

         $restoMinutos = $tiempo % 60;
         $horas = floor($minutos / 60);

         $restoShoras = $minutos % 60;
         $dias = floor($horas / 24);

         $restoDias = $horas % 24;
         $semanas = floor($dias / 7);

         $restoSemanas = $dias % 7;
         $meses = floor($dias / 30);

         $restoMeses = $dias % 30;
         $anyos = floor($dias / 365);

         if($anyos >=1){
             if($anyos == 1){
                 echo $anyos . " año.";
             }else {
                 echo $anyos . " años.";
             }
         }else if($anyos < 1 && $meses >=1){
             if($meses == 1){
                 echo $meses . " mes.";
             }else {
                 echo $meses . " meses.";
             }
         }else if($anyos < 1 && $meses <1 && $semanas >=1){
             if($semanas == 1){
                 echo $semanas . " semana.";
             }else {
                 echo $semanas . " semanas.";
             }
         }else if($anyos < 1 && $meses <1 && $semanas <1 && $dias >=1){
             if($dias == 1){
                 echo $dias . " día.";
             }else {
                 echo $dias . " días.";
             }
         }else if($anyos < 1 && $meses <1 && $semanas <1 && $dias <1 && $horas>=1){
             if($horas == 1){
                 echo $horas . " hora.";
             }else {
                 echo $horas . " horas.";
             }
         }else if($anyos < 1 && $meses <1 && $semanas <1 && $dias <1 && $horas<1 && $minutos >=1){
             if($minutos == 1){
                 echo $minutos . " minuto.";
             }else {
                 echo $minutos . " minutos.";
             }
         } else{
             if($restoSegundos == 1){
                 echo $restoSegundos . " segundo.";
             }else if ($restoSegundos == 0){
                 echo "crackeo inmediato.";
             }else{
                 echo $restoSegundos . " segundos.";
             }
         }
     }

    function mostrarTiempoCrackeo($pass){
        echo "<div style='display:flex;align-items: center;justify-content: center'>
                <p style='max-width: 1600px; max-height:60px; padding:30px; text-align: center; font-size: 35px';>";

       echo  calculoTiempo($pass);
        echo "</p></div>";
    }



    if (isset($_POST["pass"])) {
        $pass = $_POST["pass"];

        compararArray($pass);
        mostrarTiempoCrackeo($pass);
    }
    ?>
</div>
</body>
</html>