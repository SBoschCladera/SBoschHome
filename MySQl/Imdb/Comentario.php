<?php

class Comentario
{

    private string $id;
    private string $peliculaId;
    private string $usuarioId;
    private string $comentario;

    public function __construct(string $id, string $peliculaId, string $usuarioId, string $comentario)
    {
        $this->id = $id;
        $this->peliculaId = $peliculaId;
        $this->usuarioId = $usuarioId;
        $this->comentario = $comentario;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPeliculaId(): string
    {
        return $this->peliculaId;
    }

    public function getUsuarioId(): string
    {
        return $this->usuarioId;
    }

    public function getComentario(): string
    {
        return $this->comentario;
    }
}