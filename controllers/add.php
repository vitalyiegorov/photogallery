<?php

class Add extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function addPhoto() {
        $this->model->addPhoto();
    }

    public function comment() {
        $this->model->comment();
    }

    public function delete() {
        $this->model->delete();
    }

    public function run() {
        $this->view->photos = $this->model->photos();
        $this->view->css = array('add/css/index');
        $this->view->js = array('add/js/index');
        $this->view->render('add/index');
    }

}

?>