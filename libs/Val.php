<?php

//Класс для проверки данных 
class Val {

    public function __construct() {
        $this->db = new Database();
    }

    //Минимальное количество символов
    public function minlength($data, $arg) {
        if (strlen($data) < $arg) {
            return "Минимальное значение аргумента $arg.";
        }
    }

    //Максимальное количество символов
    public function maxlength($data, $arg) {
        if (strlen($data) > $arg) {
            return "Максимальное значение аргумента $arg.";
        }
    }

    //Проверка на число
    public function integer($data) {
        if (!ctype_digit($data)) {
            return "Это не является числом.";
        }
    }

    //Проверка на символы
    public function chars($data) {
        if (!preg_match("#^[a-z0-9]+$#i", $data) && strlen($data) > 0) {
            return "Недопустимые символы.";
        }
    }

    //Проверка e-mail
    public function valemail($data) {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return "Не правильно введен аргумент.";
        }
    }

    //Существует ли логин
    public function checkLogin($data) {
        $checkInfo = $this->db->select('SELECT * FROM users WHERE login = :login', array('login' => htmlspecialchars($data),));
        if (count($checkInfo) > 0) {
            return "Данный логин уже существует";
        }
    }

    //Существует ли email
    public function checkEmail($data) {
        $checkInfo = $this->db->select('SELECT * FROM users WHERE email = :email', array('email' => $data));
        if (count($checkInfo) > 0) {
            return "Данный email уже существует";
        }
    }

    //Проверка на равенство данных
    public function checkFemale($data) {
        if ($data < 0 or $data > 1) {
            return 'Вы не выбрали свой пол';
        }
    }

}

?>