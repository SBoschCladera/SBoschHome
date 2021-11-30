<?php

include_once "actor.php";
include_once "director.php";
include_once "genero.php";
include_once "pais.php";
include_once "pelicula.php";
include_once "actores_pelicula.php";
include_once "directores_pelicula.php";
include_once "generos_pelicula.php";
include_once "database.php";

$dbo = new database();
$pelicula = $dbo->getPelicula(5);
var_dump($pelicula);


?>