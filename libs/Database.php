<?php

//Подключение к базе данных
class Database extends PDO {

    protected $hostname = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $name = "photogallery";

    public function __construct() {
        parent::__construct('mysql:host=' . $this->hostname . '; dbname=' . $this->name, $this->user, $this->password);
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    /**
     * Как использовать : $this->db->select('SELECT * FROM users WHERE id = :id', array('id'=>'1'))
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);

        foreach ($array as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    /**
     * Как использовать : $this->db->insert('nameTable', array('login'=>'test', 'password' => '123')); 
     */
    public function insert($table, $data) {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES($fieldValues)");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }

    /**
     * Как использовать : $this->db->update('users',array('login' => 'test'), 'id = 1');
     */
    public function update($table, $data, $where) {
        ksort($data);

        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }

    /**
     * Как использовать :  $this->db->delete('users', 'id = 14');
     */
    public function delete($table, $where, $limit = 1) {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

}
