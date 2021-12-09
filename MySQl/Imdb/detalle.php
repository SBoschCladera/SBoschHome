<?php

include_once "actor.php";
include_once "director.php";
include_once "genero.php";
include_once "pais.php";
include_once "pelicula.php";
include_once "database.php";

/**  Instanciamos la clase logic, donde haremos todos los cálculos **/
$dbo = new database();

/**  Recuperamos todos los parámetros que el formulario envía mediante get
 * Utilizamos un operador ternario para evitar excepciones con propiedades no seteadas, por defecto será un string vacio
 **/
$peliculaId = isset($_GET["peliculaId"]) ? strval($_GET["peliculaId"]) : "";

/** Datos ya procesados **/
$pelicula = $dbo->getPelicula($peliculaId);
//var_dump($pelicula);

?>

<html lang="es">
<head>
    <title>IMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <style>
        :root {
            --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
        }

        body {
            background: #111 !important;
        }

        .card-title {
            height: 30px;
            line-height: 25px;
            padding-bottom: 60px;
            padding-top: 40px;
            text-align: center;
            color: lightslategrey;
            border: 1px solid rgba(255, 69, 0, .2);
            border-radius: 20px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-shadow: 2px 2px 8px #FF0000;
        }

        .card {
            background: #222;
            border: 1px solid #dd2476;
            color: rgba(250, 250, 250, 0.8);
            margin-top: 6rem;
            margin-bottom: 2rem;
        }

        .genero {
            position: absolute;
            top: 25%;
            left: 50%;
            color: #888888;
            font-size: 25px;
        }

        .nota {
            position: absolute;
            top: 25%;
            left: 76%;
            color: #DCDFE6;
        }

        .separador1 {
            position: absolute;
            top: 32%;
            left: 50%;
            width: 655px;
            height: 5px;
            border-top: 2px solid #888888;
        }

        .director {
            position: absolute;
            top: 35%;
            left: 50%;
            color: #DCDFE6;
            font-size: 30px;
        }

        .foto {
            width: 180px;
            margin-top: 15px;
        }

        .nombreDirectores {
            position: absolute;
            top: 69%;
            left: 50.5%;
            font-size: 22px;
            color: #DCDFE6;
        }

        .fechaDirectores {
            position: absolute;
            top: 72.7%;
            left: 50.7%;
            font-size: 18px;
            color: #DCDFE6;
        }

        .separador2 {
            position: absolute;
            top: 78%;
            left: 50%;
            width: 655px;
            height: 5px;
            border-top: 2px solid #888888;
            margin-top: 10px;
        }

        .reparto {
            position: absolute;
            top: 82%;
            left: 50%;
            color: #DCDFE6;
            font-size: 30px;
        }

        .nombreActores {
            position: absolute;
            top: 117%;
            left: 51%;
            font-size: 22px;
            color: #DCDFE6;
        }

        .fechaActores {
            position: absolute;
            top: 120.5%;
            left: 50%;
            font-size: 18px;
            color: #DCDFE6;
        }

        .separador3 {
            position: absolute;
            top: 128%;
            left: 50%;
            width: 655px;
            height: 5px;
            border-top: 2px solid #888888;
        }

        .sinopsis {
            position: absolute;
            top: 133%;
            left: 16%;
            width: 55%;
            text-align: justify;
            border: 1px solid #dd2476;
            border-radius: 5px;
            padding: 20px;
            color: #888888;
        }

        .trailer {
            position: absolute;
            top: 138%;
            left: 75%;
            text-decoration: none;
            font-size: x-large;
            border: 1px solid #dd2476;
            border-radius: 25px;
            padding: 10px;
            background-color: #DCDFE6;
            font-weight: bolder;
        }


        .trailer:hover {
            box-shadow: 0px 0px 8px 5px #888888;
            text-shadow: 0px 0px 0px transparent;
        }

        .separador4 {
            position: absolute;
            top: 188%;
            left: 78%;
            width: 120px;
            height: 20px;
        }
    </style>
</head>
<body>
<a href="firstPage.php" style="color: lightslategrey; margin: 10px">Volver atrás </a>
<div class="container">
    <div class="row">

        <!-- Pintamos la películas -->

        <?php

        echo '<h1 class="card-title" >' . $pelicula->getTitulo() . "  (" . $pelicula->getEstreno() . ")" . '</h1>';
        echo '<div class="contenedor>';
        echo '<div class="col-md-4">';
        echo '<div class="card" style="width: 37rem">';
        echo '<img src="' . $pelicula->getImagen() . '"  class="fotoCaratula" alt="...">';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="genero">';
        foreach ($pelicula->getGeneros() as $genero) {
            echo $genero->getDescripcion() . "&nbsp&nbsp";
        }
        echo '</h5>';
        echo '<h5 class="nota" >' . "Puntuación&nbsp&nbsp&nbsp" . '<div style="display:inline; color:darkorange;font-size: 25px">' . $pelicula->getNota() . '</div>' . '</h5>';
        echo '<div class="separador1">' . '</div>';
        echo '<h5 class="director">' . "Dirección " . '<div class ="foto" style="margin-top: 5px">' . '</div>';
        foreach ($pelicula->getDirectores() as $director) {
            echo '<img src="' . $director->getImagen() . '"  class="foto"..." style="border: 1px solid #dd2476;border-radius:5px">' . '&nbsp&nbsp&nbsp&nbsp&nbsp';
        }
        echo '</h5>';
        echo '<div class ="nombreDirectores">';
        foreach ($pelicula->getDirectores() as $director) {
            echo '<div style="display:inline;margin-right:45px">' . $director->getNombre() . " " . $director->getApellidos() .'</div>';
        }
        echo '</div>';
        echo '<div class ="fechaDirectores">';
        foreach ($pelicula->getDirectores() as $director) {
            echo '<div class="modulo" style="display:inline;margin-left: 30px;margin-right:65px">' . '(' . $director->getAnyoNacimiento() . ") " . '</div>';
        }
        echo '</div>';
        echo '<div class="separador2">' . '</div>';
        echo '<h5 class="reparto">' . "Reparto " . '<div class ="foto" style="margin-top: 10px">' . '</div>';
        foreach ($pelicula->getActores() as $actor) {
            echo '<img src="' . $actor->getImagen() . '"  class="foto"..." style="border: 1px solid #dd2476;border-radius:5px">' . '&nbsp&nbsp&nbsp&nbsp&nbsp';
        }
        echo '</h5>';
        echo '<div class ="nombreActores">';
        foreach ($pelicula->getActores() as $actor) {
            echo '<div style="display:inline;margin-right:65px;">' . $actor->getNombre() . " " . $actor->getApellidos() .'</div>';
        }
        echo '</div>';
        echo '<div class ="fechaActores">';
        foreach ($pelicula->getActores() as $actor) {
            echo '<div class="modulo" style="display:inline;margin-left: 35px;margin-right:75px">' . '(' . $actor->getAnyoNacimiento() . ") " . '</div>';
        }
        echo '</div>';
        echo '<div class="separador3">' . '</div>';
        echo '<h5 class="sinopsis" style="font-size: 25px;color:ivory">' . "Sinopsis: " .
            '<div style="display:inline;font-size: 20px;color: lightslategrey">' . $pelicula->getSinopsis() . '</div>' . '</h5>';
        echo '<a href="' . $pelicula->getTrailer() . '" class="trailer" style="color: lightslategrey" target="blank">VER TRAILER</a>';
        echo '<div class="separador4">' . '</div>';
        echo '</div></div></a></div>';

        ?>

    </div>
</body>





