<?php

class Expert
{
    private $name;
    private $description;
    private $profession;
    private $photo;
    private $email;
    private $id;

    public function __construct(
        string $name,
        string $description,
        string $profession,
        string $id,
        string $photo
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->profession = $profession;
        $this->id = $id;
        $this->photo = $photo ?? "";
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
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