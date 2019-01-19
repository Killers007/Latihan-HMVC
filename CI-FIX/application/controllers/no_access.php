<?php

class No_access extends MX_Controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $data = array('title'=>'No Access');
        $this->output->set_header('HTTP/1.0 401 Unauthorized');
        print_r($data);
        
    }

}
