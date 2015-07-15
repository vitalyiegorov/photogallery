<?php

class Index_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //Выводим фотки
    public function photos($id) {
        if (empty($id) || $id == 0) {
            $res = $this->db->select("SELECT * FROM photos ORDER BY date DESC");
        } else {
            $res = $this->db->select("SELECT * FROM photos ORDER BY size DESC");
        }
        return $res;
    }

    //Выводим фотку
    public function photo($id) {
        if (!empty($id) && is_numeric($id)) {
            $res = $this->db->select("SELECT * FROM photos WHERE id = :id", array('id' => $id));
            if (count($res) == 1) {
                $photo = array($res[0]['id'], $res[0]['img'], $res['0']['comment'], $res[0]['date'], $res[0]['size']);
                echo json_encode($photo);
            }
        }
    }

}

?>