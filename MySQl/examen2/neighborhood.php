<?php

class neighborhood
{

    protected int  $id;
    protected int $name;

    public function __construct(int $id, int $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): int
    {
        return $this->name;
    }

}