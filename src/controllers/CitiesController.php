<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/City.php';
require_once __DIR__.'/../models/Place.php';
require_once __DIR__."/../repository/CityRepository.php";

class CitiesController extends AppController {

    public function __construct()
    {
        parent::__construct();
        $this->cityRepository = new CityRepository();
    }

    public function home() {
        $cities = $this -> cityRepository -> getCities();
        $this -> render('home', ['cities' => $cities]);
    }

    public function searchCities(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->cityRepository->getByName($decoded['searchCities']));
        }
    }
}