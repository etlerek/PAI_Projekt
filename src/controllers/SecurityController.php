<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../models/Session.php";
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

        if (isset($_POST['logout'])) {
            $data = Session::getInstance();
            $data ->destroy();
            return $this ->render("login", ['messages' => [$data->name," ",$data->surname] ] );
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

        if ($user->getPassword() !== $password or $user->getPassword() == null) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $data = Session::getInstance();
        $data->id = $user -> getId();
        $data->name = $user -> getName();
        $data->surname = $user -> getSurname();
        $data->nickname = $user -> getNickname();
        $data->password = $user -> getPassword();
        $data->email = $user -> getEmail();
        $data->img = $user -> getImg();

        //TODO: USUN NIZEJ TEST
//        return $this ->render("login", ['messages' => [$data->id," ",$data->name," ",$data->surname] ]);

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

        if ($email == null) {
            return $this->render('register', ['messages' => ['Please provide proper email']]);
        }

        if ($password !== $confirmedPassword or $password == null) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $user = new User(-1, $email, md5($password), $name, $surname, $nickname);

        $this->userRepository->addUser($user);

        $this -> render('login', ['messages' => ['Zarejestrowałeś się, możesz się teraz zalogować na konto']]);
    }
}
