<?php

class actor
{
    protected int $actorId;
    protected string $nombre;
    protected string $apellidos;
    protected string $imagen;
    protected int $oscars;
    protected string $anyoNacimiento;
    protected string $lugarNacimiento;
    protected int $orden;

    public function __construct(int $actorId, string $nombre, string $apellidos, string $imagen, int $oscars, string $anyoNacimiento, string $lugarNacimiento, int $orden = 0)
    {
        $this->actorId = $actorId;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->imagen = $imagen;
        $this->oscars = $oscars;
        $this->anyoNacimiento = $anyoNacimiento;
        $this->lugarNacimiento = $lugarNacimiento;
        $this->orden = $orden;
    }

    public function getActorId(): int
    {
        return $this->actorId;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function getOscars(): int
    {
        return $this->oscars;
    }

    public function getAnyoNacimiento(): string
    {
        return $this->anyoNacimiento;
    }

    public function getLugarNacimiento(): string
    {
        return $this->lugarNacimiento;
    }

    public function getOrden(): int
    {
        return $this->orden;
    }


}