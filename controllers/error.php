<?php

class Error extends Controller {

    public function __construct() {
        parent::__construct();
        $this->run();
    }

    public function run() {
        $this->view->render('error/index', true);
    }

}

?>