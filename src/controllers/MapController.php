<?php

class MapController extends AppController
{
    private $expertsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->expertsRepository = new ExpertsRepository();
    }
    public function map()
    {
        $this->render('map', ['locations' => $this->expertsRepository->getExpertsWithLocation()]);
    }
}