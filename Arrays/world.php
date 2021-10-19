<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=world");
$world = json_decode($contents, true);

global $cities;
global $world;

function getUnsortedCities($world){
    //TODO: Return an array of cities without any kind of sort.
    //NOTES 1: You receive a world multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.
    foreach ($world as $country) {
        foreach ($country as  $cities) {
         //   if(is_array($cities) || is_object($cities)) {
                foreach ($cities as $city) {
                    $unsortedCities[] = $city;
                }
           // }
        }
    }
    return $unsortedCities;
}


function getSortedCitiesByPopulation($cities){
    //TODO: Return an array of cities sorted by it's population (ascending order).
    //NOTES 1: You receive a cities multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.

    // global $world;
    $sortedCities = getUnsortedCities($cities);

    for ($i = 0; $i < count($sortedCities) - 1; $i++) {
    //    $aux[] = array();

        for ($j = $i+1; $j < count($sortedCities); $j++) {
            if ($sortedCities[$j]['Population'] < $sortedCities[$i]['Population']) {
                $aux = $sortedCities[$i];
                $sortedCities[$i] = $sortedCities[$j];
                $sortedCities[$j] = $aux;
            }
        }
    }
    return $sortedCities;
}


?>
<html lang="es">
<head>
    <title>Cities of the world</title>
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
        <th colspan="6">Cities of the world (<?php
              //TODO: Logic to print the number of cities.
            echo count(getUnsortedCities($world));
              ?>)

        </th>
    </tr>
    <tr>
        <th colspan="3">Unsorted cities</th>
        <th colspan="3">Sorted cities</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Population</th>
        <th>ID</th>
        <th>Name</th>
        <th>Population</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //TODO: Logic to print the table body.


     $UnsortedArray = getUnsortedCities($world);
     $sortedArray = getSortedCitiesByPopulation($world);
    for ($i = 0; $i < count($UnsortedArray); $i++) {
        echo "<tr>
                  <td>" . $UnsortedArray[$i]["ID"] . "</td>
                  <td>" . $UnsortedArray[$i]["Name"] . "</td>
                  <td>" . $UnsortedArray[$i]["Population"] . "</td>
                  <td>" . $sortedArray[$i]["ID"] . "</td>
                  <td>" . $sortedArray[$i]["Name"] . "</td>
                  <td>" . $sortedArray[$i]["Population"] . "</td>
              </tr>";
    }

    ?>
    </tbody>
</table>
</body>
</html>
