<?php

// https://dawsonferrer.com/allabres/arrays_solutions/elephants.php

$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants)
{
    //TODO: Return an array of elephants sorted by it's number (ascending order).
    //NOTES 1: You receive a elephants multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.

    $total = count($elephants);

    for ($i = 0; $i < $total - 1; $i++) {

        $aux[] = array();
        for ($j = 0; $j < $total - 1; $j++) {
            if ($elephants[$j]['number'] > $elephants[$j + 1]['number']) {

                $aux = $elephants[$j];
                $elephants[$j] = $elephants[$j + 1];
                $elephants[$j + 1] = $aux;
            }
        }
    }
    return $elephants;
}

?>

<html lang="es">
<head>
    <title>Elephants</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }
        table {
            border-collapse: collapse;
        }
        thead {
            background-color: aquamarine;
        }
        tbody {
            background-color: aqua;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan="6">Elephants (<?php ////TODO: Logic to print the number of elephants.

                    echo count($elephants);

                                    ?>)</th>
    </tr>
    <tr>
        <th colspan="3">Unsorted elephants</th>
        <th colspan="3">Sorted elephants</th>
    </tr>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //TODO: Logic to print the table body.

    $total = count($elephants);
    $elefantesOrdenados  = getSortedElephantsByNumber($elephants);

    for ($i=0;$i < $total;$i++) {
        echo '<tr><th>'.$elephants[$i]['number'].'</th>';
        echo '<th>'.$elephants[$i]['name'].'</th>';
        echo '<th>'.$elephants[$i]['species'].'</th>';

        echo '<th>' . $elefantesOrdenados[$i]['number'] . '</th>';
        echo '<th>' . $elefantesOrdenados[$i]['name'] . '</th>';
        echo '<th>' . $elefantesOrdenados[$i]['species'] . '</th></tr>';
    }
    ?>
    </tbody>
</table>
</body>
</html>
