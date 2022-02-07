<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Place.php';

class DefaultController extends AppController {

    public function index() {

        $this -> render('login');
    }

    public function test() {

        $this -> render('test');
    }
}