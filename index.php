<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
//Router::get('map', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('best_places', 'PinController');
Router::get('test', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('map', 'PinController');
Router::post('search', 'PinController');
Router::post('places', 'PinController');
Router::post('profile', 'ProfileController');

Router::run($path);
