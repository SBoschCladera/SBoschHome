<?php

class Database
{

    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "RickAndMorty";
/*
    private $conn;
    private $servername = "sql480.main-hosting.eu";
    private $username = "u850300514_sbosch";
    private $password = "x43110436H";
    private $dbname = "u850300514_sbosch";
*/
    //Crea la conexion y la base de datos si no existe
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        if ($this->conn->connect_error) {
            die("Conection failed: " . $this->conn->connect_error);
        }

        $this->createDataBase();

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($this->conn, "utf8");

        $this->createTableCharacters();
        $this->createTableEpisodes();
        $this->createTableLocations();
        $this->createTableEpisodes_Characters();
    }

    private function createDataBase()
    {
        $query = "CREATE DATABASE IF NOT EXISTS " . $this->dbname . ";";

        $this->sendQuery($query);
    }

    private function createTableEpisodes_Characters()
    {
        $query = "CREATE TABLE IF NOT EXISTS Episodes_Characters (
                        ep_ch_id int AUTO_INCREMENT PRIMARY KEY,
                        id_cha int NOT null,
                        id_epi int NOT null,
                        FOREIGN KEY (id_cha) REFERENCES Characters(id) ON DELETE CASCADE,
                        FOREIGN KEY (id_epi) REFERENCES Episodes(id) ON DELETE CASCADE
                    )";
        $this->sendQuery($query);
    }

    private function createTableCharacters()
    {
        $query = "CREATE TABLE IF NOT EXISTS Characters (
                        id int PRIMARY KEY,
                        name varchar(255),
                        status varchar(255),
                        species varchar(255),
                        type varchar(255),
                        gender varchar(255),
                        origin varchar(255),
                        location varchar(255),
                        image varchar(255),
                        created varchar(255)
                    )";
        $this->sendQuery($query);
    }

    private function createTableLocations()
    {
        $query = "CREATE TABLE IF NOT EXISTS Locations (
                        id int PRIMARY KEY,
                        name varchar(255),
                        type varchar(255),
    					dimension varchar(255),
    					created varchar(255)
                    )";
        $this->sendQuery($query);
    }

    private function createTableEpisodes()
    {
        $query = "CREATE TABLE IF NOT EXISTS Episodes (
                        id int PRIMARY KEY,
                        name varchar(255),
                        air_date varchar(255),
    					episode varchar(255),
    					created varchar(255)
                    )";
        $this->sendQuery($query);
    }

    private function insertEpisodes_Characters($character, $episode)
    {
        $query = "INSERT INTO Episodes_Characters(id_cha, id_epi) VALUES (" . $character . "," . $episode . ")";
        $this->sendQuery($query);
    }

    public function insertEpisodes($id, $name, $air_date, $episode, $created)
    {
        $query = 'INSERT INTO Episodes VALUES (' . $id . ', "' . $name . '", "' . $air_date . '", "' . $episode . '", "' . $created . '")';
        $this->sendQuery($query);
    }

    public function insertCharacters($id, $name, $status, $species, $type, $gender, $origin, $location, $image, $created, $episodes)
    {
        $query = 'INSERT INTO Characters VALUES (' . $id . ', "' . $name . '", "' . $status . '", "' . $species . '", "' . $type . '", "' . $gender . '",
            "' . $origin . '", "' . $location . '", "' . $image . '", "' . $created . '")';
        $this->sendQuery($query);

        for ($i = 0; $i < count($episodes); $i++) {
            $this->insertEpisodes_Characters($id, $episodes[$i]);
        }
    }

    public function insertLocations($id, $name, $type, $dimension, $created)
    {
        $query = 'INSERT INTO Locations VALUES (' . $id . ', "' . $name . '", "' . $type . '", "' . $dimension . '", "' . $created . '")';
        $this->sendQuery($query);
    }

    //Comprueba si están bien construidas las querys
    private function sendQuery($query)
    {
        if (!mysqli_query($this->conn, $query)) {
            echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
        }
    }

    public function mapear_Episodes_Characters()
    {
        $ep_ch = $this->selectEp_Ch();
        $characters = $this->selectCharacters();

        for ($i = 0; $i < count($characters); $i++) {

            $episodes = [];
            for ($j = 0; $j < count($ep_ch); $j++) {
                if ($characters[$i]["id"] == $ep_ch[$j]["id_cha"]) {
                    $episodes[] = $ep_ch[$j]["id_epi"];
                }
            }

            $characters[$i]["episodes"] = $episodes;
        }
        return $characters;
    }

    public function selectLocations()
    {
        $arr = array();

        $query = "SELECT * FROM `Locations`;";
        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function selectEpisodes()
    {
        $arr = [];

        $query = "SELECT * FROM `Episodes`;";
        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    private function selectEp_Ch()
    {
        $arr = [];

        $query = "SELECT id_cha, id_epi FROM `Episodes_Characters` WHERE 1;";
        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    private function selectCharacters()
    {
        $arr = [];

        $query = "SELECT * FROM `Characters`";
        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function closeMySQL()
    {
        mysqli_close($this->conn);
    }

}

?>