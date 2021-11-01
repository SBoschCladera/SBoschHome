<?php

include circunscripciones;
include partido;
include provincia;


$provincias = [array("id" => "M","name" => "Madrid"), array("id" => "B","name" => "Barcelona"),
    array("id" => "V","name" => "Valencia"), array("id" => "A","name" => "Alicante"),
    array("id" => "S","name" => "Sevilla"), array("id" => "MA","name" => "Málaga"),
    array("id" => "MU","name" => "Murcia"), array("id" => "CA","name" => "Cádiz"),
    array("id" => "PM","name" => "Baleares"), array("id" => "C","name" => "La Coruña"),
    array("id" => "GC","name" => "Las Palmas"), array("id" => "BI","name" => "Vizcaya"),
    array("id" => "O","name" => "Asturias"), array("id" => "GR","name" => "Granada"),
    array("id" => "PO","name" => "Pontevedra"), array("id" => "TF","name" => "Santa Cruz de Tenerife"),
    array("id" => "Z","name" => "Zaragoza"), array("id" => "AL","name" => "Almería"),
    array("id" => "BA","name" => "Badajoz"), array("id" => "CO","name" => "Córdoba"),
    array("id" => "GE","name" => "Gerona"), array("id" => "SS","name" => "Guipúzcoa"),
    array("id" => "T","name" => "Tarragona"), array("id" => "TO","name" => "Toledo"),
    array("id" => "S","name" => "Cantabria"), array("id" => "CS","name" => "Castellón"),
    array("id" => "CR","name" => "Ciudad Real"), array("id" => "H","name" => "Huelva"),
    array("id" => "J","name" => "Jaén"), array("id" => "NA","name" => "Navarra"),
    array("id" => "VA","name" => "Valladolid"), array("id" => "VI","name" => "Álava"),
    array("id" => "AB","name" => "Albacete"), array("id" => "BU","name" => "Burgos"),
    array("id" => "CC","name" => "Cáceres"), array("id" => "LE","name" => "León"),
    array("id" => "L","name" => "Lérida"), array("id" => "LU","name" => "Lugo"),
    array("id" => "OR","name" => "Orense"), array("id" => "LO","name" => "La Rioja"),
    array("id" => "SA","name" => "Salamanca"), array("id" => "AV","name" => "Ávila"),
    array("id" => "CU","name" => "Cuenca"), array("id" => "GU","name" => "Guadalajara"),
    array("id" => "HU","name" => "Huesca"), array("id" => "P","name" => "Palencia"),
    array("id" => "SG","name" => "Segovia"), array("id" => "TE","name" => "Teruel"),
    array("id" => "ZA","name" => "Zamora"), array("id" => "SO","name" => "Soria"),
    array("id" => "CE","name" => "Ceuta"), array("id" => "ML","name" => "Melilla")];



$circunscripciones = [array("name"=> "Madrid",  "numEscanyos"=> "37"), array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Valencia",  "numEscanyos"=> "32"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Sevilla",  "numEscanyos"=> "12"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Baleares",  "numEscanyos"=> "8"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Las Palmas",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Asturias",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Pontevedra",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Zaragoza",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Badajoz",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Gerona",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Tarragona",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Cantabria",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Ciudad Real",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Jaén",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Valladolid",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Albacete",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Cáceres",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Lérida",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Orense",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Salamanca",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Cuenca",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Huesca",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Segovia",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Zamora",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37"),
    array("name"=> "Ceuta",  "numEscanyos"=> "37"),array("name"=> "Madrid",  "numEscanyos"=> "37")];



    /*"Barcelona"=> "32",
    "Valencia"=> "15","Alicante"=> "12",
    "Sevilla"=> "12","Málaga"=> "11",
    "Murcia"=> "10","Cádiz"=> "9",
    "Baleares"=> "8","La Coruña"=> "8",
    "Las Palmas"=> "8", "Vizcaya"=> "8",
    "Asturias"=> "7", "Granada"=> "7",
    "Pontevedra"=> "7", "Santa Cruz de Tenerife"=> "7" ,
    "Zaragoza" => "7","Almería"=> "6",
    "Badajoz"=> "6",  "Córdoba"=> "6",
    "Gerona"=> "6", "Guipúzcoa"=> "6",
    "Tarragona"=> "6","Toledo"=> "6","Cantabria"=> "5", "Castellón"=> "5",
    "Ciudad Real"=> "5", "Huelva"=> "5", "Jaén"=> "5", "Navarra" => "5","Valladolid"=> "5","Álava"=> "4", "Albacete"=> "4",
    "Burgos"=> "4", "Cáceres"=> "4", "León"=> "4", "Lérida"=> "4", "Lugo"=> "4", "Orense"=> "4", "La Rioja"=> "4",
    "Salamanca"=> "4", "Ávila"=> "3", "Cuenca"=> "3", "Guadalajara"=> "3", "Huesca"=> "3", "Palencia"=> "3", "Segovia"=> "3",
    "Teruel"=> "3", "Zamora"=> "3","Soria"=> "2","Ceuta"=> "1","Melilla"=> "1"];*/

$votos = ["Madrid" => "3591464", "Barcelona"=> "2942354","Valencia"=> "1402405","Alicante"=> "860050","Sevilla"=> "1071247","Málaga"=> "766819",
    "Murcia"=> "722345","Cádiz"=> "624195","Baleares"=> "458592","La Coruña"=> "620550", "Las Palmas"=> "489354", "Vizcaya"=> "633977","Asturias"=> "565231",
    "Granada"=> "490902", "Pontevedra"=> "530077", "Santa Cruz de Tenerife"=> "468022" ,"Zaragoza" => "517639","Almería"=> "305414", "Badajoz"=> "376940",
    "Córdoba"=> "451775", "Gerona"=> "357801", "Guipúzcoa"=> "384546", "Tarragona"=> "388088","Toledo"=> "368619","Cantabria"=> "329821", "Castellón"=> "297492",
    "Ciudad Real"=> "272470", "Huelva"=> "255329", "Jaén"=> "371043", "Navarra" => "337996","Valladolid"=> "314787","Álava"=> "172199", "Albacete"=> "216917",
    "Burgos"=> "201664", "Cáceres"=> "227621", "León"=> "265711", "Lérida"=> "4", "Lugo"=> "183141", "Orense"=> "173598", "La Rioja"=> "167549","Salamanca"=> "197673",
    "Ávila"=> "94793", "Cuenca"=> "110537", "Guadalajara"=> "133796", "Huesca"=> "114791", "Palencia"=> "97038", "Segovia"=> "86451",
    "Teruel"=> "74661", "Zamora"=> "101334","Soria"=> "47248","Ceuta"=> "33746","Melilla"=> "31172"];

$partidos = ["PP", "PSOE", "Podemos", "Ciudadanos",  "ERC", "IU", "VOX", "PNV", "Més per Mallorca"];




function createPartidos($partidos){

    for ($i = 0; $i < count($partidos); $i++) {
        $partidosObject[$i] = new partido($partidos[$i]["name"] );
    }
    return $partidosObject;
}

function createProvincia($provincias){

    for($i = 0; $i <count($provincias);$i++){
        $provinciasObject[$i] = new provincia($provincias[$i]['id'],$provincias[$i]['name']);
    }

    return $provinciasObject;
}




/*
function createcircunscrupciones($circunscripciones){

    for ($i = 0; $i < count($circunscripciones); $i++) {
        $cunscrupcionesObject[$i] = new circunscripciones($circunscripciones[$i]["provincia"] );
    }
    return $cunscrupcionesObject;
}*/



