<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/ExpertsRepository.php';

class ExpertsController extends AppController
{
    private $message = [];
    private $expertsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->expertsRepository = new ExpertsRepository();
    }

    public function experts()
    {
        $currentPage = $_GET['page'] ?? 1;
        $perPage = 12;
        $startIndex = ($currentPage - 1) * $perPage;

        $experts = $this->expertsRepository->getExperts($_GET['search']);
        $totalExperts = count($experts);
        $currentExperts = array_slice($experts, $startIndex, $perPage);

        $totalPages = ceil($totalExperts / $perPage);

        $this->render('experts', [
            'experts' => $currentExperts,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'search' => $_GET['search'] ?? "",
        ]);
    }
}