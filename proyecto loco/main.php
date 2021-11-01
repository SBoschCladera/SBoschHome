<?php

include circunscripciones;
include partido;
include provincia;

$resultsContents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$partiesContents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$districtsContents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");

$results = json_decode($resultsContents, true);
$parties = json_decode($partiesContents, true);
$districts = json_decode($districtsContents, true);


function createPartidos($parties){

    for ($i = 0; $i < count($parties); $i++) {
        $partidosObject[$i] = new partido($parties[$i]['id'], $parties[$i]['name'], $parties[$i]['acronym']);
    }
    return $partidosObject;
}

function createProvincia($districts){

    for($i = 0; $i <count($districts);$i++){
        $provinciasObject[$i] = new provincia($districts[$i]['id'],$districts[$i]['name'], $districts[$i]['delegates']);
    }
    return $provinciasObject;
}



function createcircunscrupciones($results){

    for ($i = 0; $i < count($results); $i++) {
        $resultadosObject[$i] = new resultado($results[$i]['district'],$results[$i]['party'], $results[$i]['votes']);
    }
    return $resultadosObject;
}



