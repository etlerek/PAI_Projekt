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
        //print_r($stmt);

        $pin = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($user);
        if ($pin == false) {
            return null;
        }

        return new Place(
            $pin['x'],
            $pin['y'],
            $pin['name'],
            $pin['descryption'],
            $pin['img']
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
            $pin -> getX(),
            $pin -> getY(),
            $pin -> getDescription(),
            $id_from_user,
            $pin -> getImageUrl(),
        ]);

    }
}