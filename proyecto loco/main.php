<?php

/*  https://dawsonferrer.com/allabres/oop/elections/index.php
    https://dawsonferrer.com/allabres/oop/elections/map.php
*/


include ("resultado.php");
include ("partido.php");
include ("provincia.php");

$resultsContents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$partiesContents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$districtsContents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");

$resultsJson = json_decode($resultsContents, true);
$partiesJson = json_decode($partiesContents, true);
$districtsJson = json_decode($districtsContents, true);

//var_dump($resultsJson);

function createPartidos($partiesJson)
{
    $partidosObject = array();
    for ($i = 0; $i < count($partiesJson); $i++) {
        $partidosObject[$i] = new partido($partiesJson[$i]['id'], $partiesJson[$i]['name'], $partiesJson[$i]['acronym']);
    }
    return $partidosObject;
}

function createProvincia($districtsJson)
{
    $provinciasObject = array();
    for ($i = 0; $i < count($districtsJson); $i++) {
        $provinciasObject[$i] = new provincia($districtsJson[$i]['id'], $districtsJson[$i]['name'], $districtsJson[$i]['delegates']);
    }
    return $provinciasObject;
}


function createResultado($resultsJson)
{
    $resultadosObject = array();
    for ($i = 0; $i < count($resultsJson); $i++) {
        $resultadosObject[$i] = new resultado($resultsJson[$i]['district'], $resultsJson[$i]['party'], $resultsJson[$i]['votes']);
    }
    return $resultadosObject;
}

$partido = createPartidos($partiesJson);
$provincia = createProvincia($districtsJson);
$resultado = createResultado($resultsJson);
echo "<br>.<br>.<br>.<br>";


//var_dump($provincia);
//var_dump($resultado);
//var_dump($partido);


function mapVotes()
{
    global $districtsJson;
    global $resultsJson;
    for ($i = 0; $i < count($districtsJson); $i++) {
        for ($j = 0; $j < count($resultsJson); $j++) {
            if ($resultsJson[$j]["district"] == $districtsJson[$i]["name"]) {
                $districtsJson[$i]["votes"] = $resultsJson[$j]["votes"];
            }
        }
    }

    return $districtsJson;

}
//var_dump($resultado);
//var_dump(mapVotes());



echo $resultado[1]->getVotes()."<br>";
echo $resultado[1]->getDistrict()."<br>";
echo $provincia[1]->getName()."<br>";


for($i = 0; $i <count($resultado);$i++) {
    $total = 0;
   for($j = 0; $j <count($provincia);$j++){
       if ($resultado[$i]->getDistrict() == $provincia[$j]->getName()){
       $total = $total + $resultado[$i]->getVotes();

    }
 }
    echo "<br>".$total;
}




/*
$filtrado = [];

foreach ( $array as $k => $v ) {
    if ( $v['condial_39'] == 1 ) {
        $r[$k] = $v;
    }
}

var_dump($filtrado);

/*
function filtrarProvincias($provincia){

    global $provincia;
    global $resultado;
    $filtrado = [];


    for($i = 0;$i < count($provincia);$i++){
        if($provincia->getName() == $resultado[$i]->getDistrict()){
            $filtrado[] = $resultado[$i];
        }
    }

    return $filtrado;

}





var_dump(filtrarProvincias($provincia));



/*


function Dhont()
{

    $porcentajeMin = 3 / 100;
    $minVotos = totalVotos() / $porcentajeMin;


}

echo'<th>Circumscripción</th><th>Partido</th><th>Votos</th><th>Escaños</th>';

 for ($i=0;$i < $resultado;$i++) {

        echo '<td>'.$provincia[$i]['name'].'</td>';
        echo '<td>'.$partido[$i]['acronym'].'</td>';
        echo '<td>'.$resultado[$i]['votos'].'</td>';
        echo '<td>'.$resultado[$i]['escanyos'].'</td>';
    }



 var_dump($provincia);
echo "<br>.<br>.<br>.<br>";
var_dump($resultado);

function map()
{

    global $districtsJson;
    global $resultsJson;

    for($i=0;$i<count($resultsJson);$i++){
        for($j=0;$j<count($districtsJson);$j++){
            if($resultsJson[$i]['district']=$districtsJson[$j]['name']){
                $resultsJson[$i]['idProvincia'] = $districtsJson[$j]['id'];
            }
        }
    }
    return $resultsJson;
}

 //var_dump(map());







function totalVotos()
{

    global $provincia;
    global $resultado;
    $totalVotos = 0;
    $totalPorProvincia = array();



}

/*

function totalVotos(){

    global $provincia;
    global $resultado;
    $totalVotos = 0;
    $totalPorProvincia  = Array();

    for($i = 0;$i < count($resultado);$i++){
        if($provincia[$i]['name'] == $resultado[$i]->getName()){
        $totalVotos = $totalVotos + $resultado->getVotos();
            $totalPorProvincia[$i]['votos'] = $totalVotos;
         }
    }
    return $totalVotos;
echo $sum = array_sum(array_column($resultsJson, 'votes'));

$resultadillos = ["psoe"=>957401, "pp"=>887474];

for($i = 0; $i <count(resultado::getParty());$i++){

$cosa[$i] = [resultado::$this->party()[$i]=>resultado::getVotes()[$i]];

}
//var_dump($cosa);

function dhondt($resultadillos, $totalSeats)
{
    $result = array();
    $data = array();
    foreach ($resultadillos as $party => $votes) {
        for ($i = 1; $i <= $totalSeats; $i++) {
            $data[0][] = $votes / $i;
            $data[1][] = $party;
            $data[2][] = $i;
        }
        $result[$party] = 0;
    }

    array_multisort($data[0], SORT_DESC, $data[1], SORT_ASC, $data[2]);

    for ($i = 0; $i < $totalSeats; $i++) {
        $party = $data[1][$i];
        $result[$party] = max($result[$party], $data[2][$i]);
    }

    return $result;
}
dhondt();

function LeyHondt($partiesJson){

    global $resultado;
    $escanos = [];
    $votos = [];

    for($i = 0;$i < count($partiesJson);$i++){
        $escanos[] = 0;
        $votos[] = $resultado[$i]->getVotos();
    }

    var_dump($escanos);
    var_dump($votos);


    $mayor = 0;
    for ($i = 0; $i < 7;$i++){
        for ($x = 0; $x < count($votos);$x++){
            if($votos[$x]->getVotos() > $votos[$mayor]){
                $mayor = $x;
            }
        }
        $partido[$mayor]++;
        $prueba[$mayor] = $prueba[$mayor] / 2;
    }
    return $partido;
*//*
    function introducirResultadosDistrict($results)
    {
        global $provincias_object;
        //$contador=0; //provisional arreglar escanyos
        foreach ($results as $keyresultados => $resultado) {
            foreach ($provincias_object as $key => $provinciaobjeto) {
                if ($resultado['district'] == $provinciaobjeto->getName()) {
                    $provinciaobjeto->setVotos($resultado['party'], $resultado['votes']);


                    //$provinciaobjeto->setEscanyos($contador, 0);//provisional arreglar escanyos
                    // $contador++;
                }
            }
        }
        return $provincias_object;
    }
}




/*
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escaños</title>
</head>
<body>
<div>
    <form action="main.php" method="get">
        <select name="select">
            <option value="">Comunidad</option>
            <?php
                for($i = 0;$i < count($provincias);$i++){
                    echo '<option value="'.$provincias[$i]["name"].'"> '.$provincias[$i]["name"].'</option>';
                }
                ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>
</div>
</body>
</html>
<?php
$select = $_GET["select"];
if($select != ""){
    $filtro = FilterProvincia($select);
    echo "<pre>";
    LeyHondt($filtro);
    echo "</pre>";
}else{
    echo "   ";
}*/