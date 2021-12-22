<?php

include_once "Actor.php";
include_once "Director.php";
include_once "Genero.php";
include_once "Pais.php";
include_once "Pelicula.php";
include_once "Database.php";

/**  Instanciamos la database **/

$dbo = new database();

session_start();

/**  Recuperamos todos los parámetros que el formulario envía mediante get
 * Utilizamos un operador ternario para evitar excepciones con propiedades no seteadas, por defecto será un string vacio
 **/

$filterBy = isset($_GET["filterBy"]) ? strval($_GET["filterBy"]) : "";
$filterByGeneroId = isset($_GET["genero"]) ? strval($_GET["genero"]) : "";
$filterByDirectorId = isset($_GET["director"]) ? strval($_GET["director"]) : "";
$filterByActorId = isset($_GET["actor"]) ? strval($_GET["actor"]) : "";

/** Datos ya procesados **/

$peliculas = $dbo->getPeliculas($filterByGeneroId, $filterByDirectorId, $filterByActorId);
$generos = $dbo->getGeneros();
$directores = $dbo->getDirectores();
$actores = $dbo->getActores();
//var_dump($directores);


/** Helper que nos marca in item preseleccionado en una select **/

function isSelected($filter, $match)
{
    if ($filter == $match) {
        return "selected";
    } else {
        return "";
    }
}

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

        .card {
            background: #222;
            border: 1px solid #dd2476;
            color: rgba(250, 250, 250, 0.8);
            margin-top: 2rem;
            margin-bottom: 3rem;
        }

        .selector1, .selector2, .selector3, .btn, .register, .login {
            position: relative;
            top: 8px;
        }

        .selector1 {
            right: 15%;
        }

        .selector2 {
            right: 28%;
        }

        .selector3 {
            right: 39%;
        }

        .btn {
            right: 37%;
        }

        .register, .login {
            border: 1px solid #dd2476;
            border-radius: 5px;
            background: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
        }

        .register {
            width: 150px;
            height: 40px;
            left: 85%;
        }

        .login {
            width: 100px;
            height: 40px;
            right: 150%;

        .custom .btn:hover, .btn:focus, .register:hover, .login:hover {
            background: var(--gradient) !important;
            -webkit-background-clip: initial !important;
            -webkit-text-fill-color: #fff !important;
            border: 5px solid #fff !important;
            box-shadow: #222 1px 0 10px;
        }

        img {
            height: auto; /* for IE 8 */
            overflow: hidden;
            min-height: 220px;
        }

        img:hover {
            box-shadow: 0px 0px 8px 5px #888888;
        }

        .custom {
            padding-top: 100px;
        }

    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="firstPage.php">

                // SELECTOR POR GÉNERO
                <div class="selector1">
                    <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="genero">
                        <?php

                        echo "<option " . isSelected('', $filterByGeneroId) . " value=''>Todos los géneros</option>";
                        foreach ($generos as $genero) {
                            echo '<option ' . isSelected($genero->getGeneroId(), $filterByGeneroId) . '
                        value="' . $genero->getGeneroId() . '">' . $genero->getDescripcion() . '</option>';
                        }

                        ?>
                    </select>
                </div>

                // SELECTOR POR DIRECTOR
                <div class="selector2">
                    <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="director">
                        <?php
                        echo "<option " . isSelected('', $filterByDirectorId) . " value=''>Todos los directores</option>";
                        foreach ($directores as $director) {
                            echo '<option ' . isSelected($director->getDirectorId(), $filterByDirectorId) . '
                        value="' . $director->getDirectorId() . '">' . $director->getNombre() . ' ' . $director->getApellidos() .
                                '</option>';
                        }
                        ?>

                    </select>
                </div>

                // SELECTOR POR ACTOR
                <div class="selector3">
                    <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="actor">
                        <?php
                        echo "<option " . isSelected('', $filterByActorId) . " value=''>Todos los actores</option>";
                        foreach ($actores as $actor) {
                            echo '<option ' . isSelected($actor->getActorId(), $filterByActorId) . '
                        value="' . $actor->getActorId() . '">' . $actor->getNombre() . ' ' . $actor->getApellidos() . '</option>';
                        }
                        ?>

                    </select>
                </div>
                <button class="btn btn-outline-success" type="submit"> Filtra</button>

            </form>

            <form method="get" action="register.php">
                <button class="register" type="submit" name="register">darse de alta</button>
            </form>
            <form method="get" action="login.php">
                <button class="login" type="submit" name="login">login</button>
            </form>

        </div>
    </div>
</nav>

<div class="topMargin" style="width: 3rem;height: 5rem"></div>
<div class="container mx-auto mt-4 custom">
    <div class="row">

        <!-- Pintamos el listado de películas -->

        <?php
        foreach ($peliculas as $pelicula) {
            // var_dump($peliculas);
            echo '<div class="col-md-4">';
            echo '<a href="detalle.php?peliculaId=' . $pelicula->getPeliculaId() . '"> ';
            echo '<div class="card" style="width: 20rem">';
            echo '<img src="' . $pelicula->getImagen() . '"  class="card-img-top" alt="...">' . '</a>';
            echo '<div class="card-body">';
            echo '<h3 class="card-title" >' . $pelicula->getTitulo() . '<div style="display:inline; font-size: 19px">' . " (" . $pelicula->getEstreno() . ")" . '</div>' . '</h3>';
            echo '<h5 class="nota">' . "Puntuación " . '<div style="display:inline; color:darkorange">' . $pelicula->getNota() . '</div>' . '</h5>';
            echo '</div></div></div>';
        }
        ?>

    </div>
</div>

</body>
</html>
