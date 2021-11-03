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


function Dhont()
{

    $porcentajeMin = 3 / 100;
    $minVotos = totalVotos() / $porcentajeMin;


}





