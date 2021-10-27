<?php

class episode
{
    private $id;
    public $name;
    public $air_date;
    public $episode;
    public $created;
    public $characters = array();

    public function __construct($id, $name, $air_date, $episode, $created, array $characters)
    {
        $this->id = $id;
        $this->name = $name;
        $this->air_date = $air_date;
        $this->episode = $episode;
        $this->created = $created;
        $this->characters = $characters;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return episode
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return episode
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAirDate()
    {
        return $this->air_date;
    }

    /**
     * @param mixed $air_date
     * @return episode
     */
    public function setAirDate($air_date)
    {
        $this->air_date = $air_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * @param mixed $episode
     * @return episode
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return episode
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return array
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /**
     * @param array $characters
     * @return episode
     */
    public function setCharacters(array $characters): episode
    {
        $this->characters = $characters;
        return $this;
    }
}