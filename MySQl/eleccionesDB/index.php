<?php
include "./logic/logic.php";

//Instanciamos la clase logic, donde haremos todos los cálculos
$logic = new Logic();

//Recuperamos todos los parámetros que el formulario envía mediante get
//Utilizamos un operador ternario para evitar excepciones con propiedades no seteadas, por defecto será un string vacio
$filterBy = isset($_GET["filterBy"]) ? strval($_GET["filterBy"]) : "";
$filterDistrict = isset($_GET["filterDistrict"]) ? strval($_GET["filterDistrict"]) : "";
$filterParty = isset($_GET["filterParty"]) ? strval($_GET["filterParty"]) : "";

/*FILTERS*/
//(global)
//(districts)-->filterDistrict
//(parties)-->filterParty


//Nos traemos los datos ya procesados, fullData sería la info desglosada a nivel de distrito y
//general data sería a nivel general. Para más detalle en los comentarios de los métodos.
$fullData = $logic->applyDhondtAlgorithm();
$generalData = $logic->calculateGeneralData($fullData);



// CONEXIÓN A LA BASE DE DATOS


$contents_results = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$results = json_decode($contents_results, true);

$contents_parties = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$parties= json_decode($contents_parties, true);

$contents_districts = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");
$districts = json_decode($contents_districts, true);


// CONEXIÓN A BASE DE DATOS

$servername = "localhost";
$username = "root";
// $password = "1234";

// Create connection
$conn = new mysqli($servername, $username);   // <-- Añadir $password detrás de $username para clase
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

/*

// CREAR BASE DE DATOS

$servername = "localhost";
$username = "root";
$password = "1234";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE elecciones";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully"."<br>";
} else {
    echo "Error creating database: " ."<br>". $conn->error;
}


//  CREAR TABLAS

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "elecciones";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " ."<br>". $conn->connect_error);
}


        // tabla districts

$sql = "CREATE TABLE districts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(200) NOT NULL,
delegates int
)";

if ($conn->query($sql) === TRUE) {
    echo "Table districts created successfully"."<br>";
} else {
    echo "Error creating table: " ."<br>". $conn->error;
}



        // tabla parties

$sql = "CREATE TABLE parties (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(200) NOT NULL,
acronym VARCHAR(100),
logo VARCHAR(200),
colour VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table parties created successfully"."<br>";
} else {
    echo "Error creating table: " ."<br>". $conn->error;
}



        // tabla results

$sql = "CREATE TABLE results (
districts VARCHAR(200),
party VARCHAR(200),
votes int
)";

if ($conn->query($sql) === TRUE) {
    echo "Table parties created successfully"."<br>";
} else {
    echo "Error creating table: " ."<br>". $conn->error;
}



    // Insertar datos

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "elecciones";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " ."<br>". $conn->connect_error);
}

$contents_results = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$results = json_decode($contents_results, true);

$contents_parties = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$parties= json_decode($contents_parties, true);

$contents_districts = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");
$districts = json_decode($contents_districts, true);


// INSERT PARA districts

$sql ="";
foreach ($districts as $distrito) {
    $sql .= 'INSERT INTO districts(id , name, delegates) VALUES(
           "' .$distrito["id"] .'",
           "' .$distrito["name"].'",
           "' .$distrito["delegates"] .'"
);';
}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// INSERT PARA parties

$sql ="";
foreach ($parties as $partido) {
    $sql .= 'INSERT INTO parties(id , name, acronym , logo, colour) VALUES(
           "' .$partido["id"] .'",
           "' .$partido["name"].'",
           "' .$partido["acronym"] .'",
           "' .$partido["logo"] .'",
           "' .$partido["colour"] .'"
);';
}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// INSERT PARA results *

global $results;

$sql ="";
foreach ($results as $resultado) {
    $sql .= 'INSERT INTO results(districts , party , votes) VALUES(
           "' . $resultado["district"] . '", "' .
        $resultado["party"] . '", ' .
        $resultado["votes"] . ');';
}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


*/


/** GET DATA FROM MySQL DB */

// data from table parties
$sql ="SELECT * FROM parties;";
$result = mysqli_query($conn, $sql);
$data_Partidos = mysqli_fetch_all($result, MYSQLI_ASSOC);

// data from table $districts
$sql ="SELECT * FROM $districts;";
$result = mysqli_query($conn, $sql);
$data_Provincias = mysqli_fetch_all($result, MYSQLI_ASSOC);

// data from table $results
$sql ="SELECT * FROM $results;";
$result = mysqli_query($conn, $sql);
$data_Resultados = mysqli_fetch_all($result, MYSQLI_ASSOC);

$conn->close();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sebastián Bosch</title>

    <!-- ESTILOS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- LIBRERIA JQUERY-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <form action="index.php" method="get" id="filterForm">

        <!-- SELECTOR DE FILTRO-->
        <div class="form-group">
            <select class="form-control" name="filterBy" id="filterBy" onchange="filterTypeChange()">
                <option <?= $logic->isSelected($filterBy, ""); ?> value="">Seleccionar filtrado</option>
                <option <?= $logic->isSelected($filterBy, "global"); ?> value="global">Resultados generales</option>
                <option <?= $logic->isSelected($filterBy, "districts"); ?> value="districts">Filtrar por provincia
                </option>
                <option <?= $logic->isSelected($filterBy, "parties"); ?> value="parties">Filtrar por partido</option>
            </select>
        </div>

        <!-- SELECTOR DE DISTRITO -->
        <div class="form-group">
            <select class="form-control <?= $filterBy == "districts" ? "d-flow" : "d-none"; ?>" name="filterDistrict"
                id="filterDistrict" onchange="filter()">
                <option value="">Selecciona una circumscripción</option>
                <?php
                //Iteramos todos los distritos para pintar los items del select, preseleccionamos el que viene por GET
                foreach ($logic->getDistricts() as $district) {
                    echo "<option " . $logic->isSelected($filterDistrict, $district->getName()) . " value=\"" . $district->getName() . "\">" . $district->getName() . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- SELECTOR DE PARTIDO -->
        <div class="form-group">
            <select class="form-control <?= $filterBy == "parties" ? "d-flow" : "d-none"; ?>" name="filterParty"
                id="filterParty" onchange="filter()">
                <option value="">Selecciona un partido</option>
                <?php
                //Iteramos todos los partidos para pintar los items del select, preseleccionamos el que viene por GET
                foreach ($logic->getParties() as $party) {
                    echo "<option " . $logic->isSelected($filterParty, $party->getAcronym()) . " value=\"" . $party->getAcronym() . "\">" . $party->getName() . "</option>";
                }
                ?>

            </select>
        </div>

        <input class="d-none" type="submit" value="Filtra" />
    </form>


    <table class="table table-striped <?= $filterBy == null ? "d-none" : "d-flow" ?>">
        <thead>
            <tr>
                <th scope="col">Circumscripción</th>
                <th scope="col">Partido</th>
                <th scope="col">Votos</th>
                <th scope="col">Escaños</th>
            </tr>
        </thead>
        <tbody>
            <?php

            //Si es un listado por partido o por distrito entramos en el if
            if ($filterBy == 'parties' || $filterBy == 'districts') {
                //Iteramos todos los registros
                foreach ($fullData as $row) {
                    //Si es un listado por partidos y tenemos el parametro del partido 
                    //o es un listado por distritos y tenemos el nombre del distrito
                    //continuamos para pintar el listado
                    if (($filterBy == 'parties' && $row["party"]->getAcronym() == $filterParty) || ($filterBy == 'districts' && $row["district"] == $filterDistrict)) { ?>
            <!-- Pintamos el listado -->
            <tr>
                <td><?= $row["district"]; ?></td>
                <td><img src="<?= $row["party"]->getLogo(); ?>" alt="logo" height="25px">
                    <strong><?= $row["party"]->getAcronym(); ?></strong> -
                    <?= $row["party"]->getName(); ?>
                </td>
                <td><?= $row["votes"]; ?></td>
                <td><?= $row["seats"]; ?></td>
            </tr>
            <?php }
                }
            }

            //Si es un listado global entramos en el if
            if ($filterBy == 'global') {
                //Iteramos todos los registros
                foreach ($generalData as $row) { ?>
            <!-- Pintamos el listado -->
            <tr>
                <td><?= $row["district"]; ?></td>
                <td><img src="<?= $row["party"]->getLogo(); ?>" alt="logo" height="25px">
                    <strong><?= $row["party"]->getAcronym(); ?></strong> -
                    <?= $row["party"]->getName(); ?>
                </td>
                <td><?= $row["votes"]; ?></td>
                <td><?= $row["seats"]; ?></td>
            </tr>

            <?php }
            } ?>

        </tbody>
    </table>



    <script type="text/javascript">
    //Cuando cambiamos el selector de filtro (primer selector) se muestran o ocultan los otros dos selectores
    //y se recarga la pagina si es necesario
    function filterTypeChange() {
        var filterType = document.getElementById("filterBy").value;
        if (filterType == "districts") {
            $("#filterDistrict").removeClass("d-none").addClass("d-block");
            $("#filterParty").removeClass("d-block").addClass("d-none");
            filter();
        } else if (filterType == "parties") {
            $("#filterParty").removeClass("d-none").addClass("d-block");
            $("#filterDistrict").removeClass("d-block").addClass("d-none");
            filter();
        } else if (filterType == "") {
            $("#filterParty").removeClass("d-block").addClass("d-none");
            $("#filterDistrict").removeClass("d-block").addClass("d-none");
            $(location).attr('href', "index.php");
        } else if (filterType == "global") {
            $("#filterParty").removeClass("d-block").addClass("d-none");
            $("#filterDistrict").removeClass("d-block").addClass("d-none");
            filter();
        }
    }

    function filter() {
        $("#filterForm").submit();
    }
    </script>
</body>

</html>