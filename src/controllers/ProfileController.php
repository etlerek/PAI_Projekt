<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Place.php';

class ProfileController extends AppController {

    public function profile() {
        session_start();
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
        $this -> render('profile', ['places' => [$_SESSION['name']]]);
    }
}