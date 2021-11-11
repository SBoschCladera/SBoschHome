<?php

class District
{
    private $id;
    private $name;
    private $delegates;

    public function __construct($district)
    {
        $this->id = $district["id"];
        $this->name = $district["name"];
        $this->delegates = $district["delegates"];
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDelegates($delegates)
    {
        $this->delegates = $delegates;
    }

    public function getDelegates()
    {
        return $this->delegates;
    }
}