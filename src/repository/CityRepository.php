<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Place.php';

class CityRepository extends Repository {

    public function getCities(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM cities
        ');
        $stmt -> execute();
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($cities as $city){
            $result[] = new City(
                $city['name'],
                $city['img'],
                $city['coordinates']
            );
        }
        return $result;
    }

    public function getByName(string $searchSting){
        $searchSting = '%'.strtolower($searchSting).'%';
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cities WHERE LOWER(name) LIKE :search
        ');

        $stmt -> bindParam(':search', $searchSting, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);

    }
}