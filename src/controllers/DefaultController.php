<?php

require_once 'AppController.php';

class DefaultController extends AppController
{

    public function index()
    {
        $this->render('home');
    }

    public function home()
    {
        $this->render('home');
    }

    public function logout()
    {
        $this->render('logout');
    }

    public function experts()
    {
        $this->render('experts');
    }

    public function register()
    {
        $this->render('register');
    }

    public function map()
    {
        $this->render('map');
    }

    public function login()
    {
        $this->render('login');
    }
}