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

    public function map() {

        //TODO: read data from database

        if($this ->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $place = new Place(
                floatval($_POST['x']),
                floatval($_POST['y']),
                $_POST['title'],
                'opis na sztywnitko wpisany',
//                $_POST['description'],
                'https://images.unsplash.com/photo-1633113088092-3460c3c9b13f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80');
            return $this -> render('best_places', ['places' => [$place, $place]]);
        }

        $this -> render('map');
    }

//    public function addPin()
//    {
//
//
//    }


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
