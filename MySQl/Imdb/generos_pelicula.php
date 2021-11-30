<?php

class generos_pelicula
{

    protected int $peliculaId;
    protected int $genero1Id;
    protected int $genero2Id;
    protected int $genero3Id;

    public function __construct(int $peliculaId, int $genero1Id, int $genero2Id, int $genero3Id)
    {
        $this->peliculaId = $peliculaId;
        $this->genero1Id = $genero1Id;
        $this->genero2Id = $genero2Id;
        $this->genero3Id = $genero3Id;
    }

    public function getPeliculaId(): int
    {
        return $this->peliculaId;
    }

    public function getGenero1Id(): int
    {
        return $this->genero1Id;
    }

    public function getGenero2Id(): int
    {
        return $this->genero2Id;
    }

    public function getGenero3Id(): int
    {
        return $this->genero3Id;
    }


}