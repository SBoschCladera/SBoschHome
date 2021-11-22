<?php

$seed = 0436; // DNI
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=5284&data=";

$charactersjson = json_decode(file_get_contents($api_url . "characters"), true);
$episodesjson = json_decode(file_get_contents($api_url . "episodes"), true);
$locationsjson = json_decode(file_get_contents($api_url . "locations"), true);

/*
// CONEXIÓN A BASE DE DATOS

$servername = "sql480.main-hosting.eu";
$username = "u850300514_sbosch";
$password = "x43110436H";
$dbname = "u850300514_sbosch";
*/

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "RickAndMorty";


// Create connection

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully" . "<br>";


// CREAR BASE DE DATOS


$sql = "CREATE DATABASE IF NOT EXISTS RickAndMorty";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully" . "<br>";
} else {
    echo "Error creating database: " . "<br>" . $conn->error;
}

//  CREAR TABLAS

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . "<br>" . $conn->connect_error);
}

// tabla Caracteres


$sql = "CREATE TABLE IF NOT EXISTS Caracteres (
        idChar VARCHAR(100) PRIMARY KEY,
        nameChar VARCHAR(200),
        statusChar VARCHAR(50),
        speciesChar VARCHAR(50),
        typeChar VARCHAR(50),
        genderChar VARCHAR(50),
        originChar int,
        locationChar int,
        imageChar VARCHAR(200),
        createdChar VARCHAR(100)
       
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Caracteres created successfully" . "<br>";
} else {
    echo "Error creating table: " . "<br>" . $conn->error;
}


// tabla Episodios

$sql = "CREATE TABLE IF NOT EXISTS Episodios (
        idEp VARCHAR(100) PRIMARY KEY,
        nameEp VARCHAR(200),
        air_dateEp VARCHAR(100),
        episodeEp VARCHAR(100),
        createdEp VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Episodios created successfully" . "<br>";
} else {
    echo "Error creating table: " . "<br>" . $conn->error;
}


// tabla Locations

$sql = "CREATE TABLE IF NOT EXISTS Locations (
        idLoc VARCHAR(50) PRIMARY KEY,
        nameLoc VARCHAR(200) ,
        typeLoc VARCHAR(50),
        dimensionLoc VARCHAR (100),
        createdLoc VARCHAR(200)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Locations created successfully" . "<br>";
} else {
    echo "Error creating table: " . "<br>" . $conn->error;
}


// Tabla episodios_locations


$sql = "CREATE TABLE IF NOT EXISTS episodios_caracteres (
        ep_ch_id  VARCHAR(200) PRIMARY KEY,
        id_cha VARCHAR(200),
        id_epi VARCHAR(200),
        FOREIGN KEY (id_cha) REFERENCES Caracteres(idChar) ON DELETE CASCADE,
        FOREIGN KEY (id_epi) REFERENCES Episodios(idEp) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table episodios_caracteres created successfully" . "<br>";
} else {
    echo "Error creating table: " . "<br>" . $conn->error;
}


// INSERT PARA Caracteres

$sql = "";
foreach ($charactersjson as $character) {
    $sql .= 'INSERT INTO Caracteres(idChar, nameChar, statusChar, speciesChar, typeChar, genderChar, originChar, locationChar, imageChar, createdChar) VALUES(
          "' . $character["id"] . '", 
          "' . $character["name"] . '", 
          "' . $character["status"] . '", 
          "' . $character["species"] . '", 
          "' . $character["type"] . '", 
          "' . $character["gender"] . '", 
           ' . $character["origin"] . ', 
           ' . $character["location"] . ', 
          "' . $character["image"] . '", 
          "' . $character["created"] . '"
          );';
}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// INSERT PARA Episodios

$sql = "";
foreach ($episodesjson as $episode) {
    $sql .= 'INSERT INTO Episodios(idEp , nameEp, air_dateEp , episodeEp, createdEp) VALUES(
           "' . $episode["id"] . '", 
           "' . $episode["name"] . '", 
           "' . $episode["air_date"] . '", 
           "' . $episode["episode"] . '", 
           "' . $episode["created"] . '"
               );';
}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Insert para Locations

$sql = "";
foreach ($locationsjson as $location) {
    $sql .= 'INSERT INTO Locations(idLoc , nameLoc, typeLoc , dimensionLoc, createdLoc) VALUES(
           "' . $location["id"] . '", 
           "' . $location["name"] . '", 
           "' . $location["type"] . '", 
           "' . $location["dimension"] . '", 
           "' . $location["created"] . '"
           );';

}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}
$conn->close();