<?php

//Nombre de clase siempre en mayúsculas
class Result
{
    private $district;
    private $party;
    private $votes;

    public function __construct($result)
    {
        $this->district = $result["district"];
        $this->party = $result["party"];
        $this->votes = $result["votes"];
    }

    //GETTERS AND SETTERS
    //Nombre de método siempre en minúscula la primera palabra
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function setParty($party)
    {
        $this->party = $party;
    }

    public function getParty()
    {
        return $this->party;
    }

    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    public function getVotes()
    {
        return $this->votes;
    }
}