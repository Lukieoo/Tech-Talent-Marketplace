<?php

class ProfileController extends AppController
{
    private $message = [];
    private $expertsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->expertsRepository = new ExpertsRepository();
    }

    public function edit()
    {
        session_start();

        if (!$this->isPost()) {
            $this->render('edit', ['expert' => $this->expertsRepository->getExpertFromID($_GET['id'] ?? $_SESSION['id']),
                'isProfile' => (($_GET['id'] == null && $_SESSION['id'] != null) || ($_SESSION['id'] == $_GET['id'] && $_SESSION['id'] != null))
            ]);
            return;
        }


        $profession = $_POST['profession'];
        $description = $_POST['description'];
        $name = $_POST['name'];
        $this->expertsRepository->updateExpert($_SESSION['id'], $profession, $description, $name);
        $this->renderProfile();
    }

    public function profile()
    {
        session_start();
        $this->renderProfile();

    }

    public function renderProfile(): void
    {
        $this->render('profile', ['expert' => $this->expertsRepository->getExpertFromID($_GET['id'] ?? $_SESSION['id']),
            'isProfile' => (($_GET['id'] == null && $_SESSION['id'] != null) || ($_SESSION['id'] == $_GET['id'] && $_SESSION['id'] != null))
        ]);
    }
}