<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';

class Router{

    public static $routes;

    public static function get($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller){
        self::$routes[$url] = $controller;
    }

    public static function  run($url){
        $action = explode("/", $url)[0];

        if(!array_key_exists($action, self::$routes)){
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';
        $object ->$action();
    }



//    public static function run(string $url){
//
//        $controller = new DefaultController();
//
//        if($url == 'login'){
//            $controller -> login();
//        }
//
//        if($url == 'map'){
//            $controller -> map();
//        }
//
//        if($url == 'home'){
//            $controller -> home();
//        }
//
//        //echo 'router: '.$url;
//    }
}
