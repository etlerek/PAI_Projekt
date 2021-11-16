<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function login() {

        $this -> render('login');
    }

    public function dashboard() {

        //TODO: read data from database

        // modify data

        // save data do db

        //cokolwiek

        $animals = ['dog','cat','rat','cow','bird'];

        $this -> render('dashboard', ['animals' => $animals]);
    }

}