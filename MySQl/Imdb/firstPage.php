<?php

include_once "actor.php";
include_once "director.php";
include_once "genero.php";
include_once "pais.php";
include_once "pelicula.php";
include_once "database.php";

$dbo = new database();
//$peliculas = $dbo->getPeliculas();
//var_dump($peliculas);

$pelicula = $dbo->getPelicula(2);
var_dump($pelicula);

?>