<?php

class director
{
    protected int $directorId;
    protected string $nombre;
    protected string $apellidos;
    protected string $imagen;
    protected int $oscars;
    protected int $anyoNacimiento;
    protected string $lugarNacimiento;

    public function __construct(int $directorId, string $nombre, string $apellidos, string $imagen, int $oscars, int $anyoNacimiento, string $lugarNacimiento)
    {
        $this->directorId = $directorId;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->imagen = $imagen;
        $this->oscars = $oscars;
        $this->anyoNacimiento = $anyoNacimiento;
        $this->lugarNacimiento = $lugarNacimiento;
    }

    public function getDirectorId(): int
    {
        return $this->directorId;
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

    public function getAnyoNacimiento(): int
    {
        return $this->anyoNacimiento;
    }

    public function getLugarNacimiento(): string
    {
        return $this->lugarNacimiento;
    }


}