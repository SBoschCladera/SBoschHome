<?php

class directores_pelicula
{

    protected int $director1Id;
    protected int $director2Id;

    public function __construct(int $director1Id, int $director2Id)
    {
        $this->director1Id = $director1Id;
        $this->director2Id = $director2Id;
    }

    public function getDirector1Id(): int
    {
        return $this->director1Id;
    }

    public function getDirector2Id(): int
    {
        return $this->director2Id;
    }


}