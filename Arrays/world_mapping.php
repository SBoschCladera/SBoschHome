<?php

$contents_cities = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=cities");
$cities = json_decode($contents_cities, true);
$contents_countries = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=countries");
$countries = json_decode($contents_countries, true);


    //TODO: Your code here
    function mapCities(){
        global $cities;
        global $countries;
        for($i = 0; $i < count($cities); $i++){
            for($j=0; $j < count($countries); $j++){
                if($countries[$j]["Code"] == $cities[$i]["CountryCode"]){
                    $cities[$i]["CountryName"] = $countries[$j]["Name"];
                }
            }
        }
        return $cities;
    }


    function mapCountries(){
        global $countries;
        global $cities;
        foreach ($countries as $countryKey => $countryValue){
            foreach ($cities as $cityKey => $cityValue){
                if($countryValue["Code"] == $cityValue["CountryCode"]){
                    $countries[$countryKey]["Cities"][$cityValue["ID"]] = $cityValue["Name"];
                }
            }
        }
        return $countries;
    }


var_dump($cities[0]);
var_dump(mapCities()[0]);
var_dump($countries[0]);
var_dump(mapCountries()[0]);