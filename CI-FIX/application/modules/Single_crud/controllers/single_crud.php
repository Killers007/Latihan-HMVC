<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single_crud extends MX_Controller {

	private $primary_key;
	private $tabel='silab_m_prodi';
	private $relasi=array(
		'relasi' => array(
			array('kodefakultas','silab_m_fakultas','kode_fakultas','fakultas'),
		),
	);
	private $access= array(
		'insert' => TRUE,
		'update' => TRUE,
		'delete' => TRUE,
	);

	function __construct(){
		$field=$this->db->field_data($this->tabel);
		foreach ($field as $value) {
			if ($value->primary_key==1) {
				$this->primary_key=$value->name;
			}else{

			}
		}
	}

	function __validasi(){
		foreach ($this->db->get($this->tabel)->field_data() as $value) {
		// 	echo "<pre>";
		// 	print_r($value);
		// echo "</pre>";
			$this->form_validation->set_rules($value->name, str_replace('_', ' ', strtoupper($value->name)), 'trim|required|max_length['.$value->max_length.']');
			// $this->form_validation->set_rules($value->name, $value->name, 'trim|required|min_length[1]|max_length[50]',array('required' => 'Hrus diisi'));
			// $this->form_validation->set_rules($value->name, $value->name, array('error'));
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
		// echo "<pre>";
		// print_r($this->db->get_where('menu_crud',array('tabel'=> $this->tabel))->row_array());
		// echo "</pre>";
		// echo $this->access['insert'];
	}

	public function index()
	{
		// $this->access['insert']=FALSE;
		$field=$this->db->field_data($this->tabel);
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
				'relasi' => (object)$this->relasi,
				'access' => $this->access
			)
		);
		
	}

	public function load_data()
	{
		$this->db->select(array('kodeps','namaps','fak.fakultas'));
		$this->db->from($this->tabel);
		$this->db->join('silab_m_fakultas fak','fak.kode_fakultas='.$this->tabel.'.kodefakultas');
		$data=$this->db->get();
		$data=array($data->field_data(),$data->result());
		echo json_encode($data);
		
	}

	public function buat_input(){
		echo json_encode($this->db->get($this->tabel)->field_data());
	}

	public function detail(){
		$data=$this->db->get_where($this->tabel,array($this->primary_key => $this->input->post('id')))->row();
		echo json_encode($data);	
	}

	public function hapus_data(){
		$this->db->where($this->primary_key,$this->input->post('id'));
		$this->db->delete($this->tabel);
	}

	public function update_data(){
		$this->__validasi();

		if($this->form_validation->run()== FALSE){
			$response=array();
			// echo validation_errors();
			foreach ($this->db->get($this->tabel)->field_data() as $value) {
				array_push($response, form_error($value->name));
			}
			echo json_encode($response);
		}else{
			$this->db->where($this->primary_key,$this->input->post($this->primary_key));
			$this->db->update($this->tabel,$this->input->post());
		}
		
	}

	public function tambah_data(){
		$this->__validasi();

		if($this->form_validation->run()== FALSE){
			$response=array();
			foreach ($this->db->get($this->tabel)->field_data() as $value) {
				array_push($response, form_error($value->name));
			}
			echo json_encode($response);
		}else{
			$this->db->insert($this->tabel,$this->input->post()); 
		}
		
	}
}