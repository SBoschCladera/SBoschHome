<?php

class Database
{

    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "Elecciones";
    private $parties_tablename = "partidos";
    private $districts_tablename = "provincias";
    private $results_tablename = "resultados";
/*
    private $conn;
    private $servername = "sql480.main-hosting.eu";
    private $username = "u850300514_sbosch";
    private $password = "x43110436H";
    private $dbname = "u850300514_sbosch";
    private $parties_tablename = "partidos";
    private $districts_tablename = "provincias";
    private $results_tablename = "resultados";
*/

    /*Crea la conexion y la base de datos si no existe*/
    public function __construct()
    {

        /* CREAR TABLAS
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        if ($this->conn->connect_error) {
            die("Conection failed: " . $this->conn->connect_error);
        }

        $this->createDataBase();

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($this->conn, "utf8");


        $this->createTableDistricts();
        $this->createTableParties();
        $this->createTableResults();
        /* FIN CREAR TABLAS*/

        /* SIN CREAR TABLAS */
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Conection failed: " . $this->conn->connect_error);
        }
        mysqli_set_charset($this->conn, "utf8");
        /**/
    }

    private function createDataBase()
    {
        $query = "CREATE DATABASE IF NOT EXISTS " . $this->dbname . ";";
        $this->sendQuery($query);
    }


    private function createTableDistricts()
    {
        $query = "CREATE TABLE IF NOT EXISTS " . $this->districts_tablename . " (
                    id INT PRIMARY KEY,
                    name VARCHAR(200) NOT NULL,
                    delegates int
                    )";
        $this->sendQuery($query);
    }

    private function createTableParties()
    {
        $query = "CREATE TABLE IF NOT EXISTS " . $this->parties_tablename . " (
                    id INT PRIMARY KEY,
                    name VARCHAR(200) NOT NULL,
                    acronym VARCHAR(100),
                    logo VARCHAR(200),
                    colour VARCHAR(50)
                    )";
        $this->sendQuery($query);
    }

    private function createTableResults()
    {
        $query = "CREATE TABLE IF NOT EXISTS " . $this->results_tablename . " (
                    district VARCHAR(200),
                    party VARCHAR(200),
                    votes int
                    )";
        $this->sendQuery($query);
    }

    /* Hasta aqui se llama desde el constructor */


    public function insertPartidos($party)
    {
        $query = 'INSERT INTO ' . $this->parties_tablename . ' (id, name, acronym, logo, colour) VALUES 
            (' . $party->getId() . ', "' . $party->getName() . '", "' . $party->getAcronym() . '", "' . $party->getLogo() . '", "' . $party->getColour() . '");';

        $this->sendQuery($query);
    }

    public function insertDistricts($district)
    {
        $query = "INSERT INTO " . $this->districts_tablename . " (id, name, delegates) VALUES (" . $district->getId() . ", '" . $district->getName() . "', " . $district->getDelegates() . ");";

        $this->sendQuery($query);
    }

    public function insertResults($result)
    {
        $query = 'INSERT INTO ' . $this->results_tablename . ' (district, party, votes) VALUES ("' . $result->getDistrict() . '", "' . $result->getParty() . '", "' . $result->getVotes() . '");';

        $this->sendQuery($query);
    }

    public function getPartiesFromDB()
    {
        $partiesFromDb = array();
        $sql = "SELECT * FROM " . $this->parties_tablename;
        if ($result = $this->conn->query($sql)) {
            $cont = 0;
            /* obtener un array asociativo */
            while ($row = $result->fetch_assoc()) {
                // echo var_dump($row);
                // die();
                $partiesFromDb[$cont] = new Party($row);
                $cont++;
            }
        }
        return $partiesFromDb;
    }

    public function getDistrictsFromDB()
    {
        $districtsFromDb = array();
        $sql = "SELECT * FROM " . $this->districts_tablename;
        if ($result = $this->conn->query($sql)) {
            $cont = 0;
            /* obtener un array asociativo */
            while ($row = $result->fetch_assoc()) {
                // echo var_dump($row);
                // die();
                $districtsFromDb[$cont] = new District($row);
                $cont++;
            }
        }
        return $districtsFromDb;
    }

    public function getResultsFromDB()
    {
        $resultsFromDb = array();
        $sql = "SELECT * FROM " . $this->results_tablename;
        if ($result = $this->conn->query($sql)) {
            $cont = 0;
            /* obtener un array asociativo */
            while ($row = $result->fetch_assoc()) {
                // echo var_dump($row);
                // die();
                $resultsFromDb[$cont] = new Result($row);
                $cont++;
            }
        }
        return $resultsFromDb;
    }

    private function sendQuery($query)
    {
        if (!mysqli_query($this->conn, $query)) {
            echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
        }
    }

    public function closeMySQL()
    {
        mysqli_close($this->conn);
    }
}