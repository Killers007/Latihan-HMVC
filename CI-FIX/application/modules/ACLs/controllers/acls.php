<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acls extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->session->set_userdata('id','1');
		if (!$this->acl->role_check('alat','BACA')) {
			$this->acl->no_access();
		}
	}

	public function index()
	{
		$this->load->model('M_data');
		$data=array(
			'fakultas' => $this->M_data->get_m_fakultas(),
		);
		$this->template->render('v_dashboard',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
	}
}