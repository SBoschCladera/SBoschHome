<?php

include_once "Actor.php";
include_once "Director.php";
include_once "Genero.php";
include_once "Pais.php";
include_once "Pelicula.php";


class database extends mysqli
{
    protected string $servername = "localhost";
    protected string $username = "root";
    protected string $password = "1234";
    protected string $dbname = "imdb";


    /*
    protected string $servername = "sql480.main-hosting.eu";
    protected string $username = "u850300514_sbosch";
    protected string $password = "x43110436H";
    protected string $dbname = "imdb";
*/
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

    /** SELECT para seleccionar un género por ID que devuelve un Objeto **/

    public function getGenero($generoId): genero
    {
        $sql = "SELECT * FROM genero WHERE generoId = " . $generoId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new genero($result["generoId"], $result["descripcion"]);
        return $return;
    }

    /** SELECT para seleccionar un país por ID que devuelve un Objeto **/

    public function getPais($paisId): pais
    {
        $sql = "SELECT * FROM pais WHERE paisId = " . $paisId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new pais($result["paisId"], $result["nombre"]);
        return $return;
    }

    /** SELECT para seleccionar un actor por ID que devuelve un Objeto **/

    public function getActor($actorId): actor
    {
        $sql = "SELECT * FROM actor WHERE actorId = " . $actorId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new actor($result["actorId"], $result["nombre"], $result["apellidos"], $result["imagen"], $result["oscars"], $result["anyoNacimiento"], $result["lugarNacimiento"]);
        return $return;
    }

    /** SELECT para seleccionar un director por ID que devuelve un Objeto **/

    public function getDirector($directorId): director
    {
        $sql = "SELECT * FROM actor WHERE directorId = " . $directorId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new director($result["directorId"], $result["nombre"], $result["apellidos"], $result["imagen"], $result["oscars"], $result["anyoNacimiento"], $result["lugarNacimiento"]);
        return $return;
    }

    /** SELECT para seleccionar todos los actores, devuelve un array de Objetos actor **/

    public function getActores(): array    // Para el filter de actores
    {
        $sql = "select * from actor";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new actor($result["actorId"], $result["nombre"], $result["apellidos"], $result["imagen"],
                $result["oscars"], $result["anyoNacimiento"], $result["lugarNacimiento"]);
        }
        return $return;
    }

    /** SELECT para seleccionar todos los actores de una película por el ID de ésta, devuelve un array de Objetos actor **/

    public function getActoresPelicula($peliculaId): array
    {
        $sql = "select a1.*, 1 orden from pelicula
inner join actor a1 on pelicula.actor1Id = a1.actorId
where pelicula.peliculaId =  " . $peliculaId . "
union
select a2.*, 2 orden from pelicula
inner join actor a2 on pelicula.actor2Id = a2.actorId
where pelicula.peliculaId =  " . $peliculaId . "
union
select a3.*, 3  orden from pelicula
inner join actor a3 on pelicula.actor3Id = a3.actorId
where pelicula.peliculaId = " . $peliculaId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new actor($result["actorId"], $result["nombre"], $result["apellidos"], $result["imagen"], $result["oscars"], $result["anyoNacimiento"], $result["lugarNacimiento"], $result["orden"]);
        }
        return $return;
    }

    /** SELECT para seleccionar todos los directores, devuelve un array de Objetos director **/

    public function getDirectores(): array    // Para el filter de directores
    {
        $sql = "select * from director";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new director($result["directorId"], $result["nombre"], $result["apellidos"], $result["imagen"],
                $result["oscars"], $result["anyoNacimiento"], $result["lugarNacimiento"]);
        }
        return $return;
    }

    /** SELECT para seleccionar todos los directores de una película por el ID de ésta, devuelve un array de Objetos director **/

    public function getDirectoresPelicula($peliculaId): array
    {
        $sql = "select d1.*, 1 orden from pelicula
inner join director d1 on pelicula.director1Id = d1.directorId
where pelicula.peliculaId =  " . $peliculaId . "
union
select d2.*, 2 orden from pelicula
inner join director d2 on pelicula.director2Id = d2.directorId
where pelicula.peliculaId =  " . $peliculaId;

        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new director($result["directorId"], $result["nombre"], $result["apellidos"], $result["imagen"], $result["oscars"], $result["anyoNacimiento"], $result["lugarNacimiento"], $result["orden"]);
        }
        return $return;
    }

    /** SELECT para seleccionar todos los géneros, devuelve un array de Objetos género **/

    public function getGeneros(): array    // Para el filter de géneros
    {
        $sql = "select * from genero";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new genero($result["generoId"], $result["descripcion"]);
        }
        return $return;
    }

    /** SELECT para seleccionar todos los géneros de una película por el ID de ésta, devuelve un array de Objetos género **/

    public function getGenerosPelicula($peliculaId): array
    {
        $sql = "select g1.*, 1 orden from pelicula
inner join genero g1 on pelicula.genero1Id = g1.generoId
where pelicula.peliculaId =  " . $peliculaId . "
union
select g2.*, 2 orden from pelicula
inner join genero g2 on pelicula.genero2Id = g2.generoId
where pelicula.peliculaId =  " . $peliculaId . "
union
select g3.*, 3  orden from pelicula
inner join genero g3 on pelicula.genero3Id = g3.generoId
where pelicula.peliculaId = " . $peliculaId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new genero($result["generoId"], $result["descripcion"], $result["orden"]);
        }
        return $return;
    }

    /** SELECT para seleccionar una película por el ID de ésta, devuelve un Objeto película **/

    public function getPelicula($peliculaId): pelicula
    {
        $sql = "SELECT * FROM pelicula WHERE peliculaId = " . $peliculaId;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new pelicula($result["peliculaId"], $result["titulo"], $this->getDirectoresPelicula($result["peliculaId"]),
            $this->getGenerosPelicula($result["peliculaId"]), $this->getActoresPelicula($result["peliculaId"]), $result["imagen"],  // $this->getActoresPelicula($result["peliculaId"]) -> nos traemos un array de actores para esa pelicula en concreto
            $result["nota"], $result["estreno"], $result["trailer"], $result["sinopsis"]);
        return $return;
    }

    /** SELECT para seleccionar todas las películas por el ID de ésta, devuelve un array de Objetos película.
     * Las diferentes estructuras condicionales son para poder combinar los diferentes tipos de filtrado según sus ID
     * mediante sus correspondientes SELECT
     **/

    public function getPeliculas($generoId, $directorId, $actorId): array
    {
        $sql = "SELECT * FROM pelicula";
        if ($generoId != "" || $directorId != "" || $actorId != "") {
            $first = true;
            if ($generoId != "") {
                $sql = $sql . ($first ? ' where ' : ' and ') . '(' . 'genero1Id = ' . $generoId . ' or genero2Id = ' . $generoId .
                    ' or genero3Id = ' . $generoId . ')';
                $first = false;
            }
            if ($directorId != "") {
                $sql = $sql . ($first ? ' where ' : ' and ') . '(' . 'director1Id = ' . $directorId . ' or director2Id = ' . $directorId . ')';
                $first = false;
            }
            if ($actorId != "") {
                $sql = $sql . ($first ? ' where ' : ' and ') . '(' . 'actor1Id = ' . $actorId . ' or actor2Id = ' . $actorId .
                    ' or actor3Id = ' . $actorId . ')';
                $first = false;
            }
            echo $sql;
        }
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new pelicula($result["peliculaId"], $result["titulo"], $this->getDirectoresPelicula($result["peliculaId"]),
                $this->getGenerosPelicula($result["peliculaId"]), $this->getActoresPelicula($result["peliculaId"]), $result["imagen"],  // $this->getActoresPelicula($result["peliculaId"]) -> nos traemos un array de actores para esa pelicula en concreto
                $result["nota"], $result["estreno"], $result["trailer"], $result["sinopsis"]);
        }
        return $return;
    }

    /** Devuelve todos las peliculas que contengan en el titulo el parametro */
    public function buscador($busqueda)
    {
        $sql = "SELECT * FROM peliculas WHERE titulo LIKE '%" . $busqueda . "%';";

        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new pelicula($result["peliculaId"], $result["titulo"], $this->getDirectoresPelicula($result["peliculaId"]),
                $this->getGenerosPelicula($result["peliculaId"]), $this->getActoresPelicula($result["peliculaId"]), $result["imagen"],  // $this->getActoresPelicula($result["peliculaId"]) -> nos traemos un array de actores para esa pelicula en concreto
                $result["nota"], $result["estreno"], $result["trailer"], $result["sinopsis"]);
        }
        return $return;

    }

    /* Inserta los comentarios en la tabla comentarios */
    public function insertComentario($id, $peliculaId, $usuarioId, $comentario)
    {
        $sql = "INSERT INTO `comentarios` ('id', 'peliculaId', 'usuarioId', 'comentario') VALUES 
                                            ('" . $id ."', '" . $peliculaId . "', '" . $usuarioId["usuarioId"] . "', '" . $comentario . "');";

        if (!mysqli_query($this->conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }

    /* Inserta los usuarios en la tabla usuarios */
    public function insertUsuario($usuarioid, $email, $contrasenya, $contrasenyaCrypt)
    {
        $sql = "INSERT INTO `usuarios` ('usuarioId', 'email', 'password') VALUES 
                                            ('" . $usuarioid . "', '" . $email . "', '" . $contrasenya . "');";
        $this->default();
        $query = $this->query($sql);
        $this->close();
    }

    /* Flag para comprobar si el usuario y la contraseña están en la Base de datos */
    public function comprobarUsuario($email, $password)
    {
        $sql = "SELECT * FROM `usuarios` WHERE email = '" . $email . "';";
        $query = $this->query($sql);
        $this->close();

        if (isset($query) && password_verify($password, $query["password"])) {
            return true;
        }
        return false;
    }

    public function getUsuario($email)
    {
        $sql = 'SELECT id FROM `usuarios` WHERE email = "' . $email . '";';
        $query = $this->query($sql);
        $this->close();
        return $query;
    }
}