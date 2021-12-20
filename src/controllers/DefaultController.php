<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Place.php';

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

        $city1 = new City(
            'Kraków',
            100,
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'
        );

        $city2 = new City(
            'Wrocław',
            134,
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'
        );

        $city3 = new City(
            'Kraków',
            100,
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'
        );

        $city4 = new City(
            'Wrocław',
            134,
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'
        );

        $city5 = new City(
            'Wrocław',
            134,
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'
        );

        $city6 = new City(
            'Kraków',
            100,
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'
        );

        $city7 = new City(
            'Wrocław',
            134,
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'
        );

        $this -> render('home', ['cities' => [$city1, $city2, $city3, $city4, $city5, $city6, $city7]]);
    }

    public function best_places() {

        $place1 = new Place(
            1,
            54.0,
            20.0,
            "Zakrzówek",
            'Kraków',
            "fajne miejsce",
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80',
            4.5,
            "widokowe"
        );
        $place2 = new Place(
            1,
            54.0,
            20.0,
            "Wawel",
            'Kraków',
            "fajne miejsce",
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80',
            4.5,
            "widokowe"
        );

        $place3 = new Place(
            1,
            54.0,
            20.0,
            "Kościół Mariacki",
            'Kraków',
            "fajne miejsce",
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80',
            4.5,
            "widokowe"
        );
        $place4 = new Place(
            1,
            54.0,
            20.0,
            "Super fajny punkt widokowy",
            'Kraków, a poza tym to bardzo długia adres to jest',
            "fajne miejsce",
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80',
            4.5,
            "widokowe"
        );

        $place5 = new Place(
            1,
            54.0,
            20.0,
            "Zakrzówek",
            'Kraków',
            "fajne miejsce",
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80',
            4.5,
            "widokowe"
        );
        $place6 = new Place(
            1,
            54.0,
            20.0,
            "Muzeum Narodowe",
            'Kraków',
            "fajne miejsce",
            'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80',
            4.5,
            "widokowe"
        );
        $this -> render('best_places', ['places' => [$place1, $place2, $place3, $place4, $place5, $place6]]);
    }

    public function test() {

        $this -> render('test');
    }
}