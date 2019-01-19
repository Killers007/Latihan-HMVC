<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single_crud extends MX_Controller {

	private $primary_key;
	private $tabel='silab_m_prodi';
	private $relasi=array(
		'relasi' => "[['kodefakultas','silab_m_fakultas','kode_fakultas','fakultas']]"
	);

	function __construct(){
		$this->load->library('template');
		$this->load->library('form_validation');
		$field=$this->db->field_data($this->tabel);
		foreach ($field as $value) {
			if ($value->primary_key==1) {
				$this->primary_key=$value->name;
			}else{

			}
		}
	}

	function get_relasi(){
		$tabels=$this->input->post('tabel');
		$nama=$this->input->post('nama');
		$id=$this->input->post('id');
		$this->db->select(array($id,$nama));
		echo json_encode($this->db->get($tabels)->result());
		
	}

	function tes(){
		echo "<pre>";
		print_r($this->db->get_where('menu_crud',array('tabel'=> $this->tabel))->row());
		echo "</pre>";
	}

	public function index()
	{
		
		$this->session->set_userdata('tabel',$this->tabel);
		$field=$this->db->field_data($this->session->userdata('tabel'));
		foreach ($field as $value) {
			if ($value->primary_key==1) {
				$this->primary_key=$value->name;
			}else{

			}
		}
		$this->template->render(
			'v_dashboard',
			array(
				'primary_key' => $this->primary_key,
				'field' => $this->db->get($this->tabel)->field_data(),
				'menu' => $this->db->get('menu_crud')->result(),
				'relasi' => (object)$this->relasi
			)
		);
		
	}

	public function load_data()
	{
		$data=array($this->db->get($this->session->userdata('tabel'))->field_data(),$this->db->get($this->session->userdata('tabel'))->result());
		echo json_encode($data);
		
	}

	public function hapus_data()
	{
		$this->db->where($this->primary_key,$this->input->post('id'));
		$this->db->delete($this->session->userdata('tabel'));
	}

	public function update_data()
	{
		foreach ($this->db->get($this->session->userdata('tabel'))->field_data() as $value) {
			$this->form_validation->set_rules($value->name, str_replace('_', ' ', strtoupper($value->name)), 'trim|required|min_length[1]');
			// $this->form_validation->set_rules($value->name, $value->name, 'trim|required|min_length[1]|max_length[50]',array('required' => 'Hrus diisi'));
			// $this->form_validation->set_rules($value->name, $value->name, array('error'));
		}

		if($this->form_validation->run()== FALSE){
			$response=array();
			// echo validation_errors();
			foreach ($this->db->get($this->session->userdata('tabel'))->field_data() as $value) {
				array_push($response, form_error($value->name));
			}
			echo json_encode($response);
		}else{
			$this->db->where($this->primary_key,$this->input->post($this->primary_key));
			$this->db->update($this->session->userdata('tabel'),$this->input->post());
		}
		
	}

	public function tambah_data()
	{
		foreach ($this->db->get($this->session->userdata('tabel'))->field_data() as $value) {
			$this->form_validation->set_rules($value->name, str_replace('_', ' ', strtoupper($value->name)), 'trim|required|min_length[1]');
		}

		if($this->form_validation->run()== FALSE){
			// echo validation_errors();
			$response=array();
			foreach ($this->db->get($this->session->userdata('tabel'))->field_data() as $value) {
				array_push($response, form_error($value->name));
			}
			echo json_encode($response);
		}else{
			$this->db->insert($this->session->userdata('tabel'),$this->input->post()); 
		}
		
	}
}