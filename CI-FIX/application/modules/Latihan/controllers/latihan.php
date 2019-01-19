<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_data');
	}

	public function index()
	{
		$data=array(
			'fakultas' => $this->M_data->get_m_fakultas(),
		);
		$this->template->render('v_dashboard',$data);
		echo $this->_tes();
	}

	public function _tes(){
		return 'tes';
	}
	public function show_error(){
		echo "string";
		show_error('tes',403);
	}

	public function hapus_fakultas($id)
	{
		$this->db->where('kode_fakultas',$id);
		$this->db->delete('silab_m_fakultas');
		redirect(base_url());
	}

	public function update_fakultas($id='')
	{
		
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('kode', 'Kode Fakultas', 'trim|required|min_length[1]|max_length[10]|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->db->where('kode_fakultas',$id);
			$data=array(
				'data' => $this->db->get('silab_m_fakultas'),
			);
			$this->template->render('v_edit_data',$data);

		}else{
			$data=array(
				'fakultas' => $this->input->post('fakultas'),
			);
			$this->db->where('kode_fakultas',$id);
			$this->db->update('silab_m_fakultas',$data);
			redirect(base_url());
		}
	}

	public function tambah_data()
	{
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('kode', 'Kode Fakultas', 'trim|required|min_length[1]|max_length[10]|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->template->render('v_tambah_data');
		}else{
			$data=array(
				'fakultas' => $this->input->post('fakultas'),
				'kode_fakultas' => $this->input->post('kode'),
			);
			$this->db->insert('silab_m_fakultas',$data);
			$this->template->render('v_tambah_data');
		}
	}

	public function ajax(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required|min_length[1]|max_length[12]');
		$this->form_validation->set_rules('prodi', 'Prodi', 'trim|required|min_length[1]|max_length[12]');

		if($this->form_validation->run() == FALSE) {
			$data=array(
				'fakultas' => $this->db->get('silab_m_fakultas')->result()
			);
			$this->load->view('v_ajax',$data);
		} else {
			$data=array(
				'fakultas' => $this->db->get('silab_m_fakultas')->result()
			);
			$this->load->view('v_ajax',$data);
		}

	}

	public function get_prodi(){
		// echo $this->input->post('id');
		$this->db->where('kodefakultas',$this->input->post('id'));
		// $this
		echo json_encode($this->db->get_where('silab_m_prodi')->result());
		// echo json_encode($this->db->get_where('silab_m_prodi',array('kodefakultas' => $this->input->post('id') ))->result());
		// $this->load->view('v_ajax',$data);
	}

	public function aksiajax(){
		
	}
}




// $data= array(
		// 	'data'=>  $this->M_data->get_mhs()->result(),
		// 	'field'=>  $this->M_data->get_mhs()->field_data(),

		// );
		// print_r($data['field']);
		// $this->load->view('v_tabel',$data);