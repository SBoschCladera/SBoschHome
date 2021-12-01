<?php

class actores_pelicula
{

    protected int $actor1Id;
    protected int $actor2Id;
    protected int $actor3Id;

    public function __construct(int $actor1Id, int $actor2Id, int $actor3Id)
    {
        $this->actor1Id = $actor1Id;
        $this->actor2Id = $actor2Id;
        $this->actor3Id = $actor3Id;
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