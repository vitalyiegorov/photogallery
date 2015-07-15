<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function photo($id) {
        $this->model->photo($id);
    }

    public function run($id = null) {
        $this->view->photos = $this->model->photos($id);
        $this->view->css = array('index/css/index', 'index/css/owl.carousel', 'index/css/owl.theme');
        $this->view->js = array('index/js/index', 'index/js/owl.carousel');
        $this->view->render('index/index');
    }

}

?>