<?php

class Party
{
    private $id;
    private $name;
    private $acronym;
    private $logo;
    private $colour;


    public function __construct($party)
    {
        $this->id = $party["id"];
        $this->name = $party["name"];
        $this->acronym = $party["acronym"];
        $this->logo = $party["logo"];
        $this->colour = $party["colour"];
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

    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;
    }

    public function getAcronym()
    {
        return $this->acronym;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setColour($colour)
    {
        $this->colour = $colour;
    }

    public function getColour()
    {
        return $this->colour;
    }
}