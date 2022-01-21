<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
//Router::get('map', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('best_places', 'PinController');
Router::get('profile', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('map', 'PinController');

Router::run($path);
