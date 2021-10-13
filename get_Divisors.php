<html lang="es">
<head>
    <title>Christmas tree</title>
</head>
<body>
<form method="post" action="christmas_tree.php">
    <label>
        Number of flats:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        //TODO: YOUR CODE HERE

        for($i = 1; $i<$num;$i++){
       if($num %$i == 0) {
           echo "Divisor: ". $i."<br>";
       }
            }
    }
    ?>
</div>
</body>
</html>