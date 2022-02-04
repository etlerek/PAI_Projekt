<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Tag.php';

class TagRepository extends Repository {

    public function getTags(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM tags
        ');
        $stmt -> execute();
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($tags as $tag){
            $result[] = new Tag(
                $tag['id'],
                $tag['name']
            );
        }
        return $result;
    }
}