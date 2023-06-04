<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $userRepository;

    private $message = [];

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        session_start();
        $_SESSION['userEmail'] = $email;
        $_SESSION['id'] = $user->getId();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }

    private $user;

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }
        $email = $_POST['email'];
        $password = $_POST['password'];

        $profession = $_POST['profession'];
        $description = $_POST['description'];
        $name = $_POST['name'];
        $this->user = new User(0, $email, md5($password));

        $latitude = $_POST['lat'];
        $longitude = $_POST['lng'];

        $this->user->setName($name);
        $this->user->setProfession($profession);
        $this->user->setDescription($description);
        $this->user->setLatitude($latitude);
        $this->user->setLongitude($longitude);
        $this->addPhoto();
        $this->userRepository->addUser($this->user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

    public function addPhoto()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );
            $this->user->setPhoto($_FILES['file']['name']);
        }
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}