<?php

class Add_Model extends Model {

    public function __construct() {
        parent::__construct();
        $this->form = new Form();
    }

    //Выводим фотки
    public function photos() {
        $res = $this->db->select("SELECT * FROM photos ORDER BY date DESC");
        return $res;
    }

    //Добавляем фотку
    public function addPhoto() {
        if ((($_FILES['file']['type'] == 'image/jpeg') || ($_FILES['file']['type'] == 'image/jpg') || ($_FILES['file']['type'] == 'image/png')) && ($_FILES['file']['size'] < 1024 * 3 * 1024)) {
            if (($_FILES['file']['size'] / 1024) < 1024) {
                if (strlen(htmlspecialchars($_POST['comment'])) > 20 && strlen(htmlspecialchars($_POST['comment'])) < 200) {
                    move_uploaded_file($_FILES['file']['tmp_name'], 'public/photos/' . $_FILES['file']['name']);
                    $this->db->insert('photos', array('img' => $_FILES['file']['name'], 'comment' => htmlspecialchars($_POST['comment']), 'date' => date('Y-m-d'), 'size' => $_FILES['file']['size'] / 1024));
                    $result = "Вы удачно загрузили фотографию";
                } else {
                    $result = "Комментарий должен вмещать от 20 до 200 символов!";
                }
            } else {
                $result = "Размер фотографии не должен превышать 1мб!";
            }
        } else {
            $result = "Допустимы фотографии формата jpeg, jpg, png!";
        }
        echo "<script>alert('$result');location.href='/add';</script>";
    }

    //Изменяем комментарий
    public function comment() {
        $this->form          ->  post('id')
                             ->  val('integer')
                             ->  post('comment')
                             ->  val('minlength', 20)
                             ->  val('maxlength', 200)
                             ->  submit();
        $data = $this->form  ->  fetch();
        $res = $this->db->select("SELECT `id` FROM photos WHERE id = :id ", array('id' => $data['id']));

        if (count($res[0]['id']) == 1) {
            $this->db->update('photos', array('comment' => $data['comment']), 'id = ' . $data['id']);
            echo "Вы удачно изменили комментарий";
        } else {
            echo "Фотографии не существует!";
        }
    }

    //Удаляем фотку
    public function delete() {
        $this->form          ->  post('id')
                             ->  val('integer')
                             ->  submit();
        $data = $this->form  ->  fetch();
        $res = $this->db->select("SELECT `id`,`img` FROM photos WHERE id = :id ", array('id' => $data['id']));

        if (count($res[0]['id']) == 1) {
            unlink('././public/photos/' . $res[0]['img']);
            $this->db->delete('photos', 'id = ' . $data['id']);
        } else {
            echo "Фотографии не существует!";
        }
    }

}

?>