<?php

include_once "actor.php";
include_once "director.php";
include_once "genero.php";
include_once "pais.php";
include_once "pelicula.php";
include_once "actores_pelicula.php";
include_once "directores_pelicula.php";
include_once "generos_pelicula.php";


class database extends mysqli
{
    protected string $servername = "localhost";
    protected string $username = "root";
    protected string $password = "1234";
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
        $return = new genero($result["generoId"], $result["descripcion"]);
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

    public function getActoresPelicula($peliculaId): actores_pelicula
    {
        $sql = "SELECT actor1Id, actor2Id, actor3Id FROM actores_pelicula WHERE peliculaId = " . $peliculaId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new actores_pelicula($result["actor1Id"], $result["actor2Id"], $result["actor3Id"]);
        return $return;
    }

    public function getDirectoresPelicula($peliculaId) :directores_pelicula
    {
        $sql = "SELECT director1Id, director2Id FROM directores_pelicula WHERE peliculaId = " . $peliculaId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new directores_pelicula($result["director1Id"], $result["director2Id"]);
        return $return;
    }

    public function getGenerosPelicula($peliculaId): generos_pelicula
    {
        $sql = "SELECT genero1Id, genero2Id, genero3Id FROM generos_pelicula WHERE peliculaId = " . $peliculaId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new generos_pelicula($result["genero1Id"], $result["genero2Id"], $result["genero3Id"]);
        return $return;
    }

    public function getPelicula($peliculaId): pelicula
    {
        $sql = "SELECT * FROM pelicula WHERE peliculaId = " . $peliculaId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new pelicula($result["peliculaId"], $result["titulo"], $this->getDirectoresPelicula($result["directores"]),
            $this->getGenerosPelicula($result["generos"]), $this->getActoresPelicula($result["actores"]), $result["imagen"],
            $result["nota"], $result["estreno"], $result["trailer"], $result["sinopsis"]);
        return $return;
    }

    public function getPeliculas(): array
    {
        $sql = "SELECT * FROM pelicula";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new pelicula($result["peliculaId"], $result["titulo"], $this->getDirectoresPelicula($result["directores"]),
                $this->getGenerosPelicula($result["generos"]), $this->getActoresPelicula($result["actores"]), $result["imagen"],
                $result["nota"], $result["estreno"], $result["trailer"], $result["sinopsis"]);
        }
        return $return;
    }
}