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

$actores = $dbo->getActoresPelicula(10);
var_dump($actores);
echo "<br>";
$directores = $dbo->getDirectoresPelicula(10);
var_dump($directores);
echo "<br>";
$generos = $dbo->getGenerosPelicula(10);
var_dump($generos);
echo "<br>";
echo "<br>";
$peliculas = $dbo->getPeliculas();
var_dump($peliculas);
echo "<br>";
$pelicula = $dbo->getPelicula(10);
var_dump($pelicula);


?>
