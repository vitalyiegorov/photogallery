<?php

//Обработка форм, воспомагающий класс Val
class Form {

    private $_currentItem = null;
    private $_postDate = array();
    private $_val = array();
    private $_error = array();

    public function __construct() {
        $this->_val = new Val();
    }

    //Постим
    public function post($field) {
        $this->_postDate[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }

    //Возращает уже обработанные посты
    public function fetch($fieldName = false) {
        if ($fieldName) {
            if (isset($this->_postDate[$fieldName]))
                return $this->_postDate[$fieldName];
            else
                return false;
        }else {
            return $this->_postDate;
        }
    }

    //Валидатор
    public function val($typeOfValidator, $arg = null) {

        if ($arg == null)
            $error = $this->_val->{$typeOfValidator}($this->_postDate[$this->_currentItem]);
        else
            $error = $this->_val->{$typeOfValidator}($this->_postDate[$this->_currentItem], $arg);

        if ($error)
            $this->_error[$this->_currentItem] = $error;

        return $this;
    }

    //Подтверждаем отправку постов
    public function submit() {

        if (empty($this->_error)) {
            return true;
        } else {
            $str = '';
            foreach ($this->_error as $key => $value) {
                $str .= $key . ' => ' . $value . "<br />";
            }
            exit($str);
        }
    }

}

?>