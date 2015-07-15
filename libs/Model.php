<?php

//Модель для наследования 
class Model {

    public function __construct() {
        $this->db = new Database();
    }

}

?>