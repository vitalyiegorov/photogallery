<?php

//Роутер
class Bootstrap {

    public function __construct() {
        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url, '/');
        $utl = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        if (empty($url[1]))
            $url[1] = 'index';

        $file = 'controllers/' . $url[1] . '.php';
        if (file_exists($file)) {
            require $file;
            $controller = new $url[1];
            $controller->loadModel($url[1]);

            if (isset($url[3]) && method_exists($controller, $url[2]) == true) {
                $controller->{$url[2]}($url[3]);
            } else {
                if (isset($url[2]) && method_exists($controller, $url[2]) == true) {
                    $controller->{$url[2]}();
                } else {
                    $controller->run();
                }
            }
        } else {
            require 'controllers/error.php';
            $controller = new Error();
        }
    }

}

?>