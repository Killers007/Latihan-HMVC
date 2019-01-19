<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MX_Controller {

	private $primary_key;
	public $table="menu_crud";

	function __construct(){
		$this->load->library('template');
		$this->load->library('form_validation');
		if (!$this->session->has_userdata('tabel')) {
			$this->session->set_userdata('tabel','menu_crud');
		}
		$field=$this->db->field_data($this->session->userdata('tabel'));
		foreach ($field as $value) {
			if ($value->primary_key==1) {
				$this->primary_key=$value->name;
			}else{

			}
		}
		// echo $field;
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
		print_r($this->db->get('silab_ref_role')->field_data());
		echo "</pre>";
	}


	public function index()
	{
		

		$this->template->render(
			'v_dashboard',
			array(
				'primary_key' => $this->primary_key,
				'field' => $this->db->get($this->session->userdata('tabel'))->field_data(),
				'menu' => $this->db->get('menu_crud')->result(),
			)
		);
		// echo "<pre>";
		// print_r($this->db->get($this->session->userdata('tabel'))->field_data());
		// echo "</pre>";
		
	}

	public function tabel($tabel)
	{
		if($this->db->get($tabel)){
			$this->session->set_userdata('tabel',$tabel);
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
					'field' => $this->db->get($tabel)->field_data(),
					'menu' => $this->db->get('menu_crud')->result(),
					'relasi' => $this->db->get_where('menu_crud',array('tabel'=> $tabel))->row()
				)
			);
		}else{
			show_404();
		}
		
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
		// echo "<pre>";
		// print_r($this->db->get($this->session->userdata('tabel'))->field_data())
		// echo "</pre>";
		

		foreach ($this->db->get($this->session->userdata('tabel'))->field_data() as $value) {
			$this->form_validation->set_rules($value->name, str_replace('_', ' ', strtoupper($value->name)), 'trim|required|min_length[1]|max_length[50]');
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
			$this->form_validation->set_rules($value->name, str_replace('_', ' ', strtoupper($value->name)), 'trim|required|min_length[1]|max_length[50]');
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


// $data= array(
		// 	'data'=>  $this->M_data->get_mhs()->result(),
		// 	'field'=>  $this->M_data->get_mhs()->field_data(),

		// );
		// print_r($data['field']);
		// $this->load->view('v_tabel',$data);