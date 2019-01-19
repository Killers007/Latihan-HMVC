<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {
	
	private $role='User';

	function __construct(){
		parent::__construct();
		if (!$this->acl->role_check($this->role,'BACA')) {
			$this->acl->no_access();
		}

		$this->load->library('killers_crud');

		$this->killers_crud->set_table('silab_m_user');
		$this->killers_crud->add_relation('kode_lab','silab_m_lab','kode_lab','nama_lab');
		$this->killers_crud->add_relation('prodi','silab_m_prodi','kodeps','namaps');
		$this->killers_crud->add_relation('role','silab_ref_role','id','role');
		$this->killers_crud->set_md5('password');
		// $this->killers_crud->unset_field('password');

		(!$this->acl->role_check($this->role,'TULIS'))?$this->killers_crud->unset_insert():'';
		(!$this->acl->role_check($this->role,'HAPUS'))?$this->killers_crud->unset_delete():'';
		(!$this->acl->role_check($this->role,'EDIT'))?$this->killers_crud->unset_update():'';
	}

	public function index()
	{
		if($this->input->is_ajax_request()){
			$request = $this->input->get();
			$user = $this->load->model('user_m','user');
			$data = $this->user->getDataGrid($request);
			echo json_encode($data);
		}else{
			$this->template->render(
			'index',
			$this->killers_crud->output(),'User',FALSE
			);
		}
		
		// echo "<pre>";
		// $this->killers_crud->get_field();
		// echo "</pre>";
		
	}

	function get_relasi(){
		$this->killers_crud->get_ajax_relation($this->input->post());
		
	}

	public function load_data()
	{
		$this->killers_crud->_initialize_table();
	}

	public function buat_input(){
		$this->killers_crud->get_field();
	}

	public function detail(){	
		if (!$this->acl->role_check($this->role,'BACA')) {
			$this->acl->no_access();
		}
		$this->killers_crud->detail($this->input->post('id'));
	}

	public function hapus_data(){
		if (!$this->acl->role_check($this->role,'HAPUS')) {
			$this->acl->no_access();
		}
		$this->killers_crud->delete_data($this->input->post('id'));
	}

	public function update_data(){
		if (!$this->acl->role_check($this->role,'EDIT')) {
			$this->acl->no_access();
		}
		$this->killers_crud->update_data($this->input->post());
	}

	public function tambah_data(){
		if (!$this->acl->role_check($this->role,'TULIS')) {
			$this->acl->no_access();
		}
		$this->killers_crud->add_data($this->input->post());
	}

	function tes(){
		// echo "<pre>";
		print_r($this->killers_crud->_initialize_table());
		// echo "</pre>";
		// echo $this->access['insert'];
	}
}