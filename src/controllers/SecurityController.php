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

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }

    private $user;

    public function register()
    {
   
//        $this->getFile();
//        if (!$this->isPost()) {
//            return $this->render('register');
//        }
//        $email = $_POST['email'];
//        $password = $_POST['password'];
//
//        $profession = $_POST['profession'];
//        $description = $_POST['description'];
//        $name = $_POST['name'];
//        $this->user = new User($email, md5($password));
//
//        $this->user->setName($name);
//        $this->user->setProfession($profession);
//        $this->user->setDescription($description);
//        $this->getFile();
//        $this->userRepository->addUser($this->user);
//
//        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

    private function getFile()
    {
        move_uploaded_file(
            $_FILES['file']['tmp_name'],
            dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['tmp_name']
        );
        $this->user->setPhoto($_FILES['file']['tmp_name']);
        echo $_FILES['file']['tmp_name'];
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