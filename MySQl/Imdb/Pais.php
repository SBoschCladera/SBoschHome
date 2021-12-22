<?php

class pais
{
    protected int $paisId;
    protected string $nombre;

    public function __construct(int $paisId, string $nombre)
    {
        $this->paisId = $paisId;
        $this->nombre = $nombre;
    }

    public function getPaisId(): int
    {
        return $this->paisId;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}