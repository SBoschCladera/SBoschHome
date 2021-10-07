<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="find_n_primes.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
function getDivisors($num){
        $divisores = array();
        for($i = 1; $i <= $num; $i++) {
            if($num % $i == 0) {
                $divisores[] = $i;
            }
        }
        return $divisores;
    }

    function isPrimeNum($num){
        $divisores = getDivisors($num);
        if (count($divisores) == 2) {
            return true;
        }
            return false;

         // return count(getDivisors($num)) == 2;   OTRA OPCIÓN MÁS OPTIMIZADA

    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        $primos = array();
        $total = 0;
        for ($i = 1; count($primos) < $num; $i++) {
            if (isPrimeNum($i)) {
                $primos[] = $i;
                $total++;
            }
        }
        echo  "First " . $num . " prime numbers are:" . "<br>";
        foreach ($primos as $primo) {
            echo "- " . $primo . "<br>";
        }
    }

    ?>
</div>
</body>
</html>



