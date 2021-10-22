<?php

$seed = 0000; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

$characters = json_decode(file_get_contents($api_url . "characters"), true);



class characters
{
public $id;
public $name;
public $status;
public $species;
public $type;
public $gender;
public $origin;
public $location;
public $image;
public $created;
public $episodes = array();

public function __construct($id, $name,$status, $species, $type, $gender, $origin, $location, $image, $created, array $episodes)
{
    $this->id = $id;
    $this->name = $name;
    $this->status = $status;
    $this->species = $species;
    $this->type = $type;
    $this->gender = $gender;
    $this->origin = $origin;
    $this->location = $location;
    $this->image = $image;
    $this->created = $created;
    $this->episodes = $episodes;
}

function getCharacters($id, $name,$status, $species, $type, $gender, $origin, $location, $image, $created, array $episodes){

    global $characters;
    $character= array();

    for ($i= 0;$i <count($characters);$i++) {

        $character[$i] = new characters(".{$this->id}.", ".{$this->name}.", ".{$this->status}.", ".{$this->species}.", ".{$this->type}.", ".{$this->gender}.", );

    }
}




    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return characters
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return characters
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return characters
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * @param mixed $species
     * @return characters
     */
    public function setSpecies($species)
    {
        $this->species = $species;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return characters
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @return characters
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param mixed $origin
     * @return characters
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     * @return characters
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return characters
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return characters
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * @param mixed $episodes
     * @return characters
     */
    public function setEpisodes($episodes)
    {
        $this->episodes = $episodes;
        return $this;
    }
}