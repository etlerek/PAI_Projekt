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
            $pin['coordinates']
        );
    }

    public function addPin(Place $pin): void{

        //$date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO pins (name, x, y, descryption, id_from_user, img)
        VALUES (?,?,?,?,?,?)
        ');

        $id_from_user = 4;
        $stmt->execute([
            $pin -> getName(),
            $pin -> getDescription(),
            $id_from_user,
            $pin -> getImageUrl(),
            $pin -> getCoordinates()
        ]);

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
                'byleco', //TODO
                $pin['img']

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

    public function getByName(string $searchSting){
        $searchSting = '%'.strtolower($searchSting).'%';
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM pins WHERE lower(name) LIKE :search
        ');

        $stmt -> bindParam(':search', $searchSting, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);

    }
}