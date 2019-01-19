<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihanajax extends MX_Controller {


	private $primary_key;
	private $table="silab_m_inventaris";
	private $relasi=array(
		array( 'kode_fakultas' => 
			array(
				'field' => array('kode_lab','nama_lab'),
				'table' => array('silab_m_lab'),
			),
		),
	);

	function __construct(){
		$this->load->library('template');
		$this->load->library('form_validation');
		$field=$this->db->field_data($this->table);
		foreach ($field as $value) {
			if ($value->primary_key==1) {
				$this->primary_key=$value->name;
			}
		}
	}

	function get_relasi(){
		foreach ($this->relasi as  $value) {
			// $this->db->select($value['field']);
			// $this->db->from($value['table']);
			echo "<pre>";
			print_r($value);
			echo "</pre>";
			// echo "<pre>";
			// print_r($this->db->get()->result());
			// echo "</pre>";
		}
			// echo "<pre>";
			// print_r($this->relasi);
			// echo "</pre>";
		
		

	}

	// function _remap($table){
	// 	$this->index($table);
	// }

	public function index()
	{
		$this->template->render('v_dashboard',array('primary_key' => $this->primary_key ));
		// print_r($this->db->get($this->table)->field_data());
	}

	public function load_data()
	{
		$data=array($this->db->get($this->table)->field_data(),$this->db->get($this->table)->result());
		echo json_encode($data);
	}

	public function hapus_data()
	{
		$this->db->where($this->primary_key,$this->input->post('id'));
		$this->db->delete($this->table);
	}

	public function update_data()
	{
		// echo "<pre>";
		// print_r($this->db->get($this->table)->field_data())
		// echo "</pre>";
		

		foreach ($this->db->get($this->table)->field_data() as $value) {
			// $this->form_validation->set_rules($value->name, $value->name, 'trim|required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules($value->name, $value->name, 'trim|required|min_length[1]|max_length[50]',array('required' => 'Hrus diisi'));
			// $this->form_validation->set_rules($value->name, $value->name, array('error'));
		}

		if($this->form_validation->run()== FALSE){
			$response=array();
			// echo validation_errors();
			foreach ($this->db->get($this->table)->field_data() as $value) {
				array_push($response, form_error($value->name));
			}
			echo json_encode($response);
		}else{
			$this->db->where($this->primary_key,$this->input->post($this->primary_key));
			$this->db->update($this->table,$this->input->post());
		}
		
	}

	public function tambah_data()
	{
		foreach ($this->db->get($this->table)->field_data() as $value) {
			$this->form_validation->set_rules($value->name, $value->name, 'trim|required|min_length[1]|max_length[50]');
		}

		if($this->form_validation->run()== FALSE){
			// echo validation_errors();
			foreach ($this->db->get($this->table)->field_data() as $value) {
				array_push($response, form_error($value->name));
			}
			echo json_encode($response);
		}else{
			$this->db->insert($this->table,$this->input->post()); 
		}
		
	}
}


// $data= array(
		// 	'data'=>  $this->M_data->get_mhs()->result(),
		// 	'field'=>  $this->M_data->get_mhs()->field_data(),

		// );
		// print_r($data['field']);
		// $this->load->view('v_tabel',$data);