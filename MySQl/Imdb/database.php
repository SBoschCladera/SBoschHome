<?php

include_once "actor.php";
include_once "director.php";
include_once "genero.php";
include_once "pais.php";
include_once "pelicula.php";


class database extends mysqli
{
    protected string $servername = "localhost";
    protected string $username = "root";
    protected string $password = "";
    protected string $dbname = "imdb";

    public function default()
    {
        $this->local();
    }

    public function local()
    {
        parent::__construct($this->servername, $this->username, $this->password, $this->dbname);

        if (mysqli_connect_error()) {
            die("ERROR DATABASE: " . mysqli_connect_error());
        }
    }

    public function getGenero($generoId): genero
    {
        $sql = "SELECT * FROM genero WHERE id = " . $generoId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new genero($result["generoId"], $result["nombre"]);
        return $return;
    }

    public function getPais($paisId): pais
    {
        $sql = "SELECT * FROM pais WHERE id = " . $paisId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new pais($result["paisId"], $result["nombre"]);
        return $return;
    }

    public function getActor($actorId): actor
    {
        $sql = "SELECT * FROM actor WHERE id = " . $actorId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new actor($result["actorId"], $result["nombre"], $result["apellidos"], $result["imagen"], $result["oscars"], $result["anyoNacimiento"], $result["lugarNacimiento"]);
        return $return;
    }

    public function getDirector($directorId): director
    {
        $sql = "SELECT * FROM actor WHERE id = " . $directorId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new director($result["directorId"], $result["nombre"], $result["apellidos"], $result["imagen"], $result["oscars"], $result["anyoNacimiento"], $result["lugarNacimiento"]);
        return $return;
    }

    public function getPelicula($peliculaId): pelicula
    {
        $sql = "SELECT * FROM pelicula WHERE id = " . $peliculaId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $resultActores = $query->fetch_assoc();
        $resultDirectores = $query->fetch_assoc();
        $resultGeneros = $query->fetch_assoc();
            $return = new pelicula($result["peliculaId"], $result["titulo"], $resultDirectores(["director1Id"],["director2Id"]),
                               $resultGeneros(["generoI1d"],["genero2Id"],["genero3Id"]),
                               $resultActores(["actor1Id"],["actor2Id"],["actor3Id"]), $result["imagen"], $result["nota"],
                               $result["estreno"], $result["trailer"], $result["sinopsis"]);
        return $return;
    }

    public function getPeliculas(): array
    {
        $sql = "SELECT * FROM pelicula";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        $resultActores = $query->fetch_assoc();
        $resultDirectores = $query->fetch_assoc();
        $resultGeneros = $query->fetch_assoc();
        while ($result = $query->fetch_assoc()) {
            $return[] = new pelicula($result["peliculaId"], $result["titulo"], $resultDirectores(["director1Id"],["director2Id"]),
                                 $resultGeneros(["generoI1d"],["genero2Id"],["genero3Id"]),
                                 $resultActores(["actor1Id"],["actor2Id"],["actor3Id"]), $result["imagen"], $result["nota"],
                                 $result["estreno"], $result["trailer"], $result["sinopsis"]);
        }
        return $return;
    }

}