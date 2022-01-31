<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Place.php';

class CitiesController extends AppController {


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
}