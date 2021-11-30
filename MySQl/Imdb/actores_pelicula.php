<?php

class actores_pelicula
{

    protected int $peliculaId;
    protected int $actor1Id;
    protected int $actor2Id;
    protected int $actor3Id;

    public function __construct(int $peliculaId, int $actor1Id, int $actor2Id, int $actor3Id)
    {
        $this->peliculaId = $peliculaId;
        $this->actor1Id = $actor1Id;
        $this->actor2Id = $actor2Id;
        $this->actor3Id = $actor3Id;
    }

    public function getPeliculaId(): int
    {
        return $this->peliculaId;
    }

    public function getActor1Id(): int
    {
        return $this->actor1Id;
    }

    public function getActor2Id(): int
    {
        return $this->actor2Id;
    }

    public function getActor3Id(): int
    {
        return $this->actor3Id;
    }


}