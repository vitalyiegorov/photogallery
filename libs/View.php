<?php

//Класс для отображения страниц
class View {

    public function __construct() {
        
    }

    public function render($name, $noInclude = false) {
        if ($noInclude == true) {
            include 'views/' . $name . '.php';
        } else {
            include 'views/header.php';
            include 'views/' . $name . '.php';
            include 'views/footer.php';
        }
    }

}

?>