<?php

class provincia{

    private $id;
    private $name;
    private $delegates;

 public function __construct($id, $name, $delegates)
{
    $this->id = $id;
    $this->name = $name;
    $this->delegates = $delegates;
}
public function getId()
{
    return $this->id;
}
public function setId($id): void
{
    $this->id = $id;
}
public function getName()
{
    return $this->name;
}
public function setName($name): void
{
    $this->name = $name;
}
public function getDelegates()
{
    return $this->delegates;
}
public function setDelegates($delegates): void
{
    $this->delegates = $delegates;
}

}