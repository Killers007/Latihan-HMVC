<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MX_Controller {

	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->acl->logout();
		redirect(base_url('login'));
	}
}
