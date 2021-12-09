<?php

class pelicula
{

    protected int $peliculaId;
    protected string $titulo;
    protected array $directores;
    protected array $generos;
    protected array $actores;
    protected string $imagen;
    protected float $nota;
    protected int $estreno;
    protected string $trailer;
    protected string $sinopsis;


    public function __construct(int   $peliculaId, string $titulo, array $directores, array $generos,
                                array $actores, string $imagen, float $nota, int $estreno, string $trailer, string $sinopsis)
    {
        $this->peliculaId = $peliculaId;
        $this->titulo = $titulo;
        $this->directores = $directores;
        $this->generos = $generos;
        $this->actores = $actores;
        $this->imagen = $imagen;
        $this->nota = $nota;
        $this->estreno = $estreno;
        $this->trailer = $trailer;
        $this->sinopsis = $sinopsis;
    }

    public function getPeliculaId(): int
    {
        return $this->peliculaId;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDirectores(): array
    {
        return $this->directores;
    }

    public function getGeneros(): array
    {
        return $this->generos;
    }

    public function getActores(): array
    {
        return $this->actores;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function getNota(): float
    {
        return $this->nota;
    }

    public function getEstreno(): int
    {
        return $this->estreno;
    }

    public function getTrailer(): string
    {
        return $this->trailer;
    }

    public function getSinopsis(): string
    {
        return $this->sinopsis;
    }

}