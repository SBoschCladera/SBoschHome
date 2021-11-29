<?php

class pelicula
{

    protected int $peliculaId;
    protected string $titulo;
    protected array $director; // array
    protected array $genero; // array
    protected array $actor; // array
    protected string $imagen;
    protected float $nota;
    protected int $estreno;
    protected string $trailer;
    protected string $sinopsis;

    public function __construct(int $peliculaId, string $titulo, array $director, array $genero, array $actor, string $imagen, float $nota, int $estreno, string $trailer, string $sinopsis)
    {
        $this->peliculaId = $peliculaId;
        $this->titulo = $titulo;
        $this->director = $director;
        $this->genero = $genero;
        $this->actor = $actor;
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

    public function getDirector(): array
    {
        return $this->director;
    }

    public function getGenero(): array
    {
        return $this->genero;
    }

    public function getActor(): array
    {
        return $this->actor;
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