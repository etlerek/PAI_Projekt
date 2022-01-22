<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../models/Place.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/PinRepository.php";

class PinController extends AppController
{

    private $messages = [];
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $pinRepository;

    public function __construct()
    {
        parent::__construct();
        $this->pinRepository = new PinRepository();
    }

    public function map() {

        //TODO: read data from database

        if($this ->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $pin = new Place(
                floatval($_POST['x']),
                floatval($_POST['y']),
                $_POST['title'],
                $_POST['description'],
                $_POST['address'],
                $_FILES['file']['name']
            );

            $this->pinRepository->addPin($pin);

            return $this -> render('best_places', ['pins' => $this->pinRepository -> getPins()]);
        }

        $this -> render('map');
    }

    public function best_places() {

        $pins = $this -> pinRepository -> getPins();
        $this -> render('best_places', ['pins' => $pins]);
    }

    public function search(){

    }


    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}
