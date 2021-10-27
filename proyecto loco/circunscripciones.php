<?php

class circunscripciones
{
private $provincia;
private $numEscanyos;

    function __construct($provincia, $numEscanyos)
    {
        $this->provincia = $provincia;
        $this->numEscanyos = $numEscanyos;
    }


    public function getProvincia()
    {
        return $this->provincia;
    }


    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
        return $this;
    }


    public function getNumEscanyos()
    {
        return $this->numEscanyos;
    }


    public function setNumEscanyos($numEscanyos)
    {
        $this->numEscanyos = $numEscanyos;
        return $this;
    }


}