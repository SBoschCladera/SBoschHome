<?php

class image
{
    protected int $id;
    protected int $propertyId;
    protected string $url;

    public function __construct(int $id, int $propertyId, string $url)
    {
        $this->id = $id;
        $this->propertyId = $propertyId;
        $this->url = $url;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPropertyId(): int
    {
        return $this->propertyId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }


}