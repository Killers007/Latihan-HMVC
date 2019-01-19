<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengelola extends MX_Controller {

	private $role='Pengelola';
	private $table='silab_m_pengelola';
	private $primary_key='idpengelola';

	public function __construct(){
		parent::__construct();
		$this->load->model('pengelola_m','PengelolaM');
	}

	public function index(){
		if (!$this->acl->role_check($this->role,'BACA')) {
			show_error('Tidak memiliki otoritas',401);
		}
		if($this->input->is_ajax_request()){
			$request = $this->input->get();
			$data = $this->PengelolaM->getDataGrid($request);
			echo json_encode($data);
		}else{
			$this->load->library('form_validation');
			$this->template->render('index',array(),$this->role,FALSE);
		}
	}

	public function hapus_data()
	{
		$this->db->where($this->primary_key,$this->input->post('id'));
		$this->db->delete('silab_m_pengelola');
	}

	public function update_data()
	{
		$this->__validation();

		if($this->form_validation->run()== FALSE){
			$response=array();
			array_push($response, form_error('idpengelola'));
			echo json_encode($response);
		}else{
			$this->db->where($this->primary_key,$this->input->post($this->primary_key));
			$this->db->update($this->table,$this->input->post());
		}
		
	}

	public function tambah_data()
	{
		$this->__validation();

		if($this->form_validation->run()== FALSE){
			$response=array();
			array_push($response, form_error('idpengelola'));
			echo json_encode($response);
		}else{
			$this->db->insert($this->table,$this->input->post()); 
		}
		
	}

	public function __validation(){
		$this->form_validation->set_rules('idpengelola', 'ID Pengelola', 'trim|required|min_length[1]');
	}

}
