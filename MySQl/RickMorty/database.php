<?php

$seed = 0436; // DNI
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=5284&data=";

$charactersjson = json_decode(file_get_contents($api_url . "characters"), true);
$episodesjson = json_decode(file_get_contents($api_url . "episodes"), true);
$locationsjson = json_decode(file_get_contents($api_url . "locations"), true);


// CONEXIÓN A BASE DE DATOS

$servername = "sql480.main-hosting.eu";
$username = "u850300514_sbosch";
$password = "x43110436H";
$dbname = "u850300514_sbosch";

/*
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "RickAndMorty";

*/


// Create connection

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully" . "<br>";


// CREAR BASE DE DATOS


$sql = "CREATE DATABASE IF NOT EXIST u850300514_sbosch";
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
        id VARCHAR(100) PRIMARY KEY,
        name VARCHAR(200),
        status VARCHAR(50),
        species VARCHAR(50),
        type VARCHAR(50),
        gender VARCHAR(50),
        origin int,
        location int,
        image VARCHAR(200),
        created VARCHAR(100),
        episodes VARCHAR(200)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Caracteres created successfully" . "<br>";
} else {
    echo "Error creating table: " . "<br>" . $conn->error;
}


// tabla Episodios

$sql = "CREATE TABLE IF NOT EXISTS Episodios (
        id VARCHAR(100) PRIMARY KEY,
        name VARCHAR(200),
        air_date VARCHAR(100),
        episode VARCHAR(100),
        created VARCHAR(50),
        characters VARCHAR(200)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Episodios created successfully" . "<br>";
} else {
    echo "Error creating table: " . "<br>" . $conn->error;
}


// tabla Locations

$sql = "CREATE TABLE IF NOT EXISTS Locations (
        id VARCHAR(50) PRIMARY KEY,
        name VARCHAR(200) ,
        type VARCHAR(50),
        dimension VARCHAR (100),
        created VARCHAR(200),
        residents VARCHAR (900)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Locations created successfully" . "<br>";
} else {
    echo "Error creating table: " . "<br>" . $conn->error;
}
/*

// Tabla episodios_locations


$sql = "CREATE TABLE IF NOT EXISTS episodios_caracteres (
        ep_ch_id  int AUTO_INCREMENT PRIMARY KEY,
        id_cha int,
        id_epi int,
        FOREIGN KEY (id_cha) REFERENCES Caracteres(id) ON DELETE CASCADE,
        FOREIGN KEY (id_epi) REFERENCES Episodios(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table episodios_caracteres created successfully" . "<br>";
} else {
    echo "Error creating table: " . "<br>" . $conn->error;
}
*/

// INSERT PARA Caracteres

$sql = "";
foreach ($charactersjson as $character) {
    $sql .= 'INSERT INTO Caracteres(id, name, status, species, type, gender, origin, location, image, created, episodes) VALUES(
          "' . $character["id"] . '", 
          "' . $character["name"] . '", 
          "' . $character["status"] . '", 
          "' . $character["species"] . '", 
          "' . $character["type"] . '", 
          "' . $character["gender"] . '", 
           ' . $character["origin"] . ', 
           ' . $character["location"] . ', 
          "' . $character["image"] . '", 
          "' . $character["created"] . '", 
          "' . json_encode($charactersjson["episodes"]) . '"
          )';
}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// INSERT PARA Episodios

$sql = "";
foreach ($episodesjson as $episode) {
    $sql .= 'INSERT INTO Episodios(id , name, air_date , episode, created, characters) VALUES(
           "' . $episode["id"] . '", 
           "' . $episode["name"] . '", 
           "' . $episode["air_date"] . '", 
           "' . $episode["episode"] . '", 
           "' . $episode["created"] . '",
           "' . json_encode($episodesjson["characters"]) . '"
               )';
}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Insert para Locations

$sql = "";
foreach ($locationsjson as $location) {
    $sql .= 'INSERT INTO Locations(id , name, type , dimension, created, residents) VALUES(
           "' . $location["id"] . '", 
           "' . $location["name"] . '", 
           "' . $location["type"] . '", 
           "' . $location["dimension"] . '", 
           "' . $location["created"] . '",
           "' . json_encode($locationsjson["residents"]) . '"
           )';

}

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}
$conn->close();