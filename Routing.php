<?php

require_once 'src/controllers/DefaultController.php';

class Router{

    public static function run(string $url){

        $controller = new DefaultController();

        if($url == 'login'){
            $controller -> login();
        }

        if($url == 'dashboard'){
            $controller -> dashboard();
        }
        
        //echo 'router: '.$url;
    }
}