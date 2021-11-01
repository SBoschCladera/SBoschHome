<?php

class partido{

    private $name;
    private $acronym;
    private $logo;

       public function __construct($name, $acronym, $logo)
    {
        $this->name = $name;
        $this->acronym = $acronym;
        $this->logo = $logo;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getAcronym()
    {
        return $this->acronym;
    }


    public function setAcronym($acronym): void
    {
        $this->acronym = $acronym;
    }


    public function getLogo()
    {
        return $this->logo;
    }


    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }


}