<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Place.php';

class ProfileController extends AppController {

    private $pinRepository;

    public function __construct()
    {
        parent::__construct();
        $this->pinRepository = new PinRepository();
    }

    public function profile() {
        $data = Session::getInstance();
        $id = $data -> id;
        $pins = $this -> pinRepository -> getById($id);
        if(!isset($_SESSION['id'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $this -> render('profile', ['pins' => $pins]);
    }
}