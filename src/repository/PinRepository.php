<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Place.php';

class PinRepository extends Repository {

    public function getPin(int $id): ?Place{
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM public.pins WHERE id = :id 
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $pin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($pin == false) {
            return null;
        }

        return new Place(
            $pin['name'],
            $pin['descryption'],
            $pin['img'],
            $pin['coordinates'],
            $pin['address'],
            $pin['tag']
        );
    }

    public function addPin(Place $pin): void{

        //$date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO pins (name, descryption, id_from_user, img, coordinates, address, tag)
        VALUES (?,?,?,?,?,?,?)
        ');

        $data = Session::getInstance();

        $id_from_user = $data -> id;
        $stmt->execute([
            $pin -> getName(),
            $pin -> getDescription(),
            $id_from_user,
            $pin -> getImageUrl(),
            $pin -> getCoordinates(),
            $pin -> getAddress(),
            $pin -> getTag()

        ]);

        try{
            $stmt = $this->database->connect()->prepare('
        INSERT INTO tags (name)
        VALUES (?)
        ');
            $stmt->execute([
                $pin -> getTag()
            ]);
        }
        catch(Exception $e){

        }
    }

    public function getPins(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM pins
        ');
        $stmt -> execute();
        $pins = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($pins as $pin){
            $result[] = new Place(
                $pin['coordinates'],
                $pin['name'],
                $pin['descryption'],
                $pin['address'],
                $pin['img'],
                $pin['tag']

            );
        }

        return $result;
    }

    public function getPinsToMap(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM pins
        ');
        $stmt -> execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByName(string $searchSting, array $searchTags){

        $searchSting = '%'.strtolower($searchSting).'%';

        if(empty($searchTags)) {
            $stmt = $this->database->connect()->prepare('SELECT * FROM pins WHERE LOWER(name) LIKE :search OR LOWER(address) LIKE :search');
        }

        else {
            $stmt = $this->database->connect()->prepare('SELECT * FROM pins WHERE ((LOWER(name) LIKE :search OR LOWER(address) LIKE :search) AND (tag LIKE :searchTag))');
            $stmt -> bindParam(':searchTag',$searchTags[0], PDO::PARAM_STR);
        }

        $stmt -> bindParam(':search', $searchSting, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);


    }

    public function getById($id): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM pins WHERE id_from_user = :id
        ');
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
        $pins = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($pins as $pin){
            $result[] = new Place(
                $pin['coordinates'],
                $pin['name'],
                $pin['descryption'],
                $pin['address'],
                $pin['img'],
                $pin['tag']

            );
        }

        return $result;
    }
}