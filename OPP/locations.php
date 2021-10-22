<?php

$seed = 0436; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

$locations = json_decode(file_get_contents($api_url . "locations"), true);


var_dump($locations);
class locations{

    public $id;
    public $name;
    public $type;
    public $dimension;
    public $created;
    public $residents = array();


    public function __construct($id, $name, $type, $dimension, $created, array $residents)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->dimension = $dimension;
        $this->created = $created;
        $this->residents = $residents;
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
     * @return locations
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
     * @return locations
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return locations
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @param mixed $dimension
     * @return locations
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;
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
     * @return locations
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return array
     */
    public function getResidents()
    {
        return $this->residents;
    }

    /**
     * @param array $residents
     * @return locations
     */
    public function setResidents($residents)
    {
        $this->residents = $residents;
        return $this;
    }


}

