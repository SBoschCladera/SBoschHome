<?php

class resultado
{
private $district;
private $party;
private $votes;

    public function __construct($district, $party, $votes)
    {
        $this->district = $district;
        $this->party = $party;
        $this->votes = $votes;
    }


    public function getDistrict()
    {
        return $this->district;
    }


    public function setDistrict($district): void
    {
        $this->district = $district;
    }


    public function getParty()
    {
        return $this->party;
    }


    public function setParty($party): void
    {
        $this->party = $party;
    }


    public function getVotes()
    {
        return $this->votes;
    }


    public function setVotes($votes): void
    {
        $this->votes = $votes;
    }


}