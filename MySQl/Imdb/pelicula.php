<?php

class pelicula
{

    protected int $peliculaId;
    protected string $titulo;
    protected directores_pelicula $directores;
    protected generos_pelicula $generos;
    protected actores_pelicula $actores;
    protected string $imagen;
    protected float $nota;
    protected int $estreno;
    protected string $trailer;
    protected string $sinopsis;

    public function __construct(int $peliculaId, string $titulo, directores_pelicula $directores, generos_pelicula $generos,
                                actores_pelicula $actores, string $imagen, float $nota, int $estreno, string $trailer, string $sinopsis)
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

    public function getDirector(): directores_pelicula
    {
        return $this->directores;
    }

    public function getGenero(): generos_pelicula
    {
        return $this->generos;
    }

    public function getActor(): actores_pelicula
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