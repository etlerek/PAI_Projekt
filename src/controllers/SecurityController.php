<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../repository/UserRepository.php";

class SecurityController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {

        if (isset($_POST['register'])) {
            return $this->render('register');
        }

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = md5($_POST['password']);

        $user = $this->userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ['User does not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

//        return $this ->render("map");

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/map");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $nickname = $_POST['nickname'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];


        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, md5($password), $name, $surname, $nickname);

        $this->userRepository->addUser($user);

        $this -> render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}
