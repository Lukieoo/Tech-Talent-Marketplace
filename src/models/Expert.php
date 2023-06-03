<?php

class Expert
{
    private $name;
    private $description;
    private $profession;
    private $photo;

    public function __construct(
        string $name,
        string $description,
        string $profession,
               $photo
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->profession = $profession;
        $this->photo = $photo ?? "";;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getProfession()
    {
        return $this->profession;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

}