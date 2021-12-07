<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {

        $this -> render('login');
    }

    public function map() {

        //TODO: read data from database

        // modify data

        // save data do db

        //cokolwiek

        $this -> render('map',);
    }

    public function home() {

        $this -> render('home');
    }

    public function test() {

        $this -> render('test');
    }
}