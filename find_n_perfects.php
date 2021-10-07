<html lang="es">
    <head>
        <title>Find N perfect numbers</title>
    </head>
    <body>
        <form method="post" action="find_n_perfects.php">
            <label>
                Number:
                <input type="text" name="num"/>
            </label>
            <input type="submit"/>
        </form>
        <div>
            <?php
            function getDivisors($num){
                // suma todos divisores de un numero y lo devuelve
                $total = 0;
                for($i = 1; $i < $num; $i++) {
                    if($num % $i == 0) {
                        $total += $i;
                    }
                }
                return $total;
            }
            function isPerfectNum($num){
                // devuelve un valor booleano, compara si $num es igual a la suma de sus divisores
                return $num == getDivisors($num);
            }
            if (isset($_POST["num"])) {
                $num = intval($_POST["num"]);
                $numeros = 0;
                // iterar hasta que la cantidad de numeros sea el numero solicitado
                for ($i = 1; $numeros < $num; $i++) {
                    if (isPerfectNum($i)) {
                        $numeros += 1;
                        echo $i . "<br>";
                    }
                }
            }
            ?>
        </div>
    </body>
</html>