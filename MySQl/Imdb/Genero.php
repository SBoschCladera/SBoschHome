<?php

class genero
{
    protected int $generoId;
    protected string $descripcion;
    protected int $orden;

    public function __construct(int $generoId, string $descripcion, int $orden = 0)
    {
        $this->generoId = $generoId;
        $this->descripcion = $descripcion;
        $this->orden = $orden;
    }

    public function getGeneroId(): int
    {
        return $this->generoId;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getOrden(): int
    {
        return $this->orden;
    }

}