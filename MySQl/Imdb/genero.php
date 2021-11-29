<?php

class genero
{
    protected int $generoId;
    protected string $descripcion;

    public function __construct(int $generoId, string $descripcion)
    {
        $this->generoId = $generoId;
        $this->descripcion = $descripcion;
    }

    public function getGeneroId(): int
    {
        return $this->generoId;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }


}