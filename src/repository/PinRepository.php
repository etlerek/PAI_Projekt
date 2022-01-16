<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Place.php';

class PinRepository extends Repository {
    public function getPin(id $id): ?Place{
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
}