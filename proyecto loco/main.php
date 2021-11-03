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

// var_dump($partiesJson);

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
*/
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

$

if(){}

echo $sum = array_sum(array_column($resultsJson, 'votes'));

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
}