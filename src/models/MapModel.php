<?php

class MapModel implements JsonSerializable
{
    private $location;
    private $name;
    private $photo;
    private $id;

    public function __construct($location, $name, $photo, $id)
    {
        $this->location = $location;
        $this->name = $name;
        $this->photo = $photo;
        $this->id = $id;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location): void
    {
        $this->location = $location;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    public function jsonSerialize()
    {
        return [
            'location' => $this->location,
            'name' => $this->name,
            'photo' => $this->photo,
            'id' => $this->id,
        ];
    }
}