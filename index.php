<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('login', 'SecurityController');
Router::get('home', 'DefaultController');
Router::get('register', 'SecurityController');
Router::get('logout', 'DefaultController');
Router::get('experts', 'ExpertsController');
Router::get('profile', 'ProfileController');
Router::get('edit', 'ProfileController');
Router::get('map', 'MapController');

Router::run($path);