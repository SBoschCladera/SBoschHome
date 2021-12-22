<?php

class Usuario
{
    private string $usuarioId;
    private string $email;
    private string $contrasenya;

    public function __construct(string $usuarioId, string $email, string $contrasenya)
    {
        $this->usuarioId = $usuarioId;
        $this->email = $email;
        $this->contrasenya = $contrasenya;
    }

    public function getUsuarioId(): string
    {
        return $this->usuarioId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getContrasenya(): string
    {
        return $this->contrasenya;
    }



}