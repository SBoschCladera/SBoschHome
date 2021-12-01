<?php

include_once "country.php";
include_once "city.php";
include_once "image.php";
include_once "neighborhood.php";
include_once "state.php";
include_once "property.php";

class property
{

    protected int $id;
    protected country $country;
    protected state $State;
    protected city $City;
    protected neighborhood $neighborhood;
    protected int $zipcode;
    protected float $latitude;
    protected float $longitude;
    protected DateTime $date;
    protected string $description;
    protected int $bathrooms;
    protected int $floor;
    protected int $rooms;
    protected int $surface;
    protected int $price;
    protected array $images;

    public function __construct(int $id, country $country, state $State, city $City, neighborhood $neighborhood,
                                int $zipcode, float $latitude, float $longitude, DateTime $date, string $description,
                                int $bathrooms, int $floor, int $rooms, int $surface, int $price, array $images)
    {
        $this->id = $id;
        $this->country = $country;
        $this->State = $State;
        $this->City = $City;
        $this->neighborhood = $neighborhood;
        $this->zipcode = $zipcode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->date = $date;
        $this->description = $description;
        $this->bathrooms = $bathrooms;
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->surface = $surface;
        $this->price = $price;
        $this->images = $images;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCountry(): country
    {
        return $this->country;
    }

    public function getState(): state
    {
        return $this->State;
    }

    public function getCity(): city
    {
        return $this->City;
    }

    public function getNeighborhood(): neighborhood
    {
        return $this->neighborhood;
    }

    public function getZipcode(): int
    {
        return $this->zipcode;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getBathrooms(): int
    {
        return $this->bathrooms;
    }

    public function getFloor(): int
    {
        return $this->floor;
    }

    public function getRooms(): int
    {
        return $this->rooms;
    }

    public function getSurface(): int
    {
        return $this->surface;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getImages(): array
    {
        return $this->images;
    }


}