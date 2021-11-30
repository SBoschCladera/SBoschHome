<?php

class directores_pelicula
{

    protected int $peliculaId;
    protected int $director1Id;
    protected int $director2Id;

    public function __construct(int $peliculaId, int $director1Id, int $director2Id)
    {
        $this->peliculaId = $peliculaId;
        $this->director1Id = $director1Id;
        $this->director2Id = $director2Id;
    }

    public function getPeliculaId(): int
    {
        return $this->peliculaId;
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