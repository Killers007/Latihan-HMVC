<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single_crud_library extends MX_Controller {

	function __construct(){
		$this->load->library('killers_crud');

		$this->killers_crud->set_table('silab_m_pengelola');
		$this->killers_crud->add_relation('kode_lab','silab_m_lab','kode_lab','nama_lab');
		$this->killers_crud->add_relation('status_kepegawaian','silab_ref_status','kode_status','status_pegawai');
		$this->killers_crud->set_rules('nama','Nama','required|numeric|max_length[3]', array('required' => 'Nama Harus di isi' ));
		$this->killers_crud->set_rules('nip','Nip','required');
		// $this->killers_crud->unset_update();
		// $this->tabel=$this->killers_crud->get_table();
		// $this->primary_key=$this->killers_crud->get_primary_key();
	}

	public function index()
	{
		$this->template->render(
			'v_dashboard',
			$this->killers_crud->output()
		);
		
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
		$this->killers_crud->detail($this->input->post('id'));
	}

	public function hapus_data(){
		$this->killers_crud->delete_data($this->input->post('id'));
	}

	public function update_data(){
		$this->killers_crud->update_data($this->input->post());
	}

	public function tambah_data(){
		$this->killers_crud->add_data($this->input->post());
	}

	function tes(){
		// echo "<pre>";
		print_r($this->killers_crud->_initialize_table());
		// echo "</pre>";
		// echo $this->access['insert'];
	}
}