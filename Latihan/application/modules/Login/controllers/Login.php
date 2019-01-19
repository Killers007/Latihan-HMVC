<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

	
	public function __construct(){
		parent::__construct();

		if ($this->acl->is_login()) {
			redirect(base_url());
		}
	}

	public function index(){
		$this->load->view('index');
	}

	public function action(){

		$this->db->select('*');
		$this->db->from('silab_m_user a');
		$this->db->join('silab_ref_role b','b.id=a.role');
		$this->db->where(array('id_user'=>$this->input->post('username'),'password'=>md5($this->input->post('password'))));
		$data=$this->db->get()->row();
		if (!empty($data)) {
			$this->session->set_userdata('login',$data);
			redirect(base_url());
			print_r($data);
		}else{
			redirect(base_url('login/'));
			print_r($data);
		}
		
	}
}
