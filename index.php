<?php 
//Конфиги
require_once 'config/config.php';

//Автоматическая подгрузка классов
function __autoload($class){
    require_once LIBS.$class.".php";
}

//Включаем роутер
new Bootstrap();
?>