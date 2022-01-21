<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {
    public function getUser(string $email): ?User{
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM public.users WHERE email = :email
        ");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        //print_r($stmt);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($user);
        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['nickname']
        );
    }

    public function addUser(User $user) {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (name, surname, email, password, nickname)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getNickname()
        ]);
    }
}