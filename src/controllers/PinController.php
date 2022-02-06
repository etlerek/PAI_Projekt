<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../models/Place.php";
require_once __DIR__."/../repository/UserRepository.php";
require_once __DIR__."/../repository/PinRepository.php";
require_once __DIR__."/../repository/TagRepository.php";

class PinController extends AppController
{

    private $messages = [];
    const MAX_FILE_SIZE = 1024*1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $pinRepository;
    private $tagRepository;

    public function __construct()
    {
        parent::__construct();
        $this->pinRepository = new PinRepository();
        $this->tagRepository = new TagRepository();
    }

    public function map() {

        $tags = $this -> tagRepository -> getTags();
        if($this ->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $pin = new Place(
                $_POST['coordinates'],
                $_POST['title'],
                $_POST['description'],
                $_POST['address'],
                $_FILES['file']['name'],
                $_POST['tagAddPin']
            );

            $this->pinRepository->addPin($pin);

            //return $this -> render('best_places', ['pins' => $this->pinRepository -> getPins()]);
            return $this -> render('map' , ['tags' => $tags]);
        }

        $this -> render('map', ['tags' => $tags]);
    }

    public function best_places() {

        $pins = $this -> pinRepository -> getPins();
        $tags = $this -> tagRepository -> getTags();
        $this -> render('best_places', ['pins' => $pins, 'tags' => $tags]);
    }

    public function places(){
        header('Content-type: application/json');
        http_response_code(200);

        echo json_encode($this->pinRepository->getPinsToMap());
    }

    public function goToBest_places(){
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/best_places");
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);


            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->pinRepository->getByName($decoded['search'], $decoded['tags'][0]));
        }
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
