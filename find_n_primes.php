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
        //TODO: YOUR CODE HERE

        $divisors = array();


        for($i = 1; $i<$num;$i++){
            if($num %$i == 0) {
               $divisors[] = $i;
            }
        }
        return $divisors;
    }
    function isPrimeNum($num){

        $divisors = getDivisors($num);
        if(count(getDivisors($num)) == 2){
            return true;
        }
            return false;
        // return count(getDivisors($num)) == 2;   OTRA OPCIÓN MÁS OPTIMIZADA
     }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        //TODO: YOUR CODE HERE







    }
    ?>
</div>
</body>
</html>



