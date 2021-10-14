<html lang="es">
<head>
    <title>Ordenar Array</title>
</head>
<body>
<div>
<?php

$num = array("2", "20","12","7" ,"5","9","1","42","23","6");

echo "Voy a ordenar el siguiente Array : 2, 20, 12, 7, 5, 9, 1, 42, 23, 6."."<br><br>";

$total = count($num);

for ($i = 0; $i <$total -1;$i++) {
    $posMin = $i;

    for ($j = $i + 1; $j < $total; $j++) {

        if ($num[$j] < $num[$posMin]) {
            $posMin = $j;
        }
    }
        $aux = $num[$i];
        $num[$i] = $num[$posMin];
        $num[$posMin] = $aux;
}
echo "Array ordenado: ";

foreach ($num as $numOrdenado) {
    echo $numOrdenado." " ;
}
?>
</div>
</body>
</html>
