<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class session extends MX_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->library('session');
		// $this->load->helper('tes');
	}

	public function index()
	{
		$data=array(
			'profil' => array(
				'nama' => 'juhdi',
				'nim'=> '1611016210001',
			),
			'angkatan' => '2016',
			'prodi' => 'Ilmu Komputer',
		);
		print_r($anjay=tesing($data));
		echo $anjay->angkatan;
		echo $this->session->set_userdata('sess',$data);
		// echo $this->session->set_userdata('anjay');
		// echo $this->session->anjay;
	}

	function segment(){
		$seg=$this->uri->uri_string();
		echo "<pre>";
		print_r($seg);
		echo "</pre>";
	}

	function urls($base=''){
		switch ($base) {
			case 'base_url':
				echo base_url();
				break;
			case 'current_url':
				echo current_url();
				break;
			case 'site_url':
				echo site_url();
				break;
			case 'base_url':
				echo base_url();
				break;
			
			default:
				# code...
				break;
		}
	}

	function buat(){
		$data=array(
			'profil' => array(
				'nama' => 'juhdi',
				'nim'=> '1611016210001',
			),
			'angkatan' => '2016',
			'prodi' => 'Ilmu Komputer',
		);

		// echo $this->session->set_userdata('sess',$data);
		echo $this->session->set_userdata('user','data');
	}

	function liat(){
		echo "<pre>";
		// print_r($this->session->all_userdata()['sess']['profil']);
		// print_r($this->session->userdata('sess')['profil']);

		print_r($this->session->all_userdata());
		// echo $this->session->flashdata('juhdi');
		echo "</pre>";
		// print_r($arr=$this->session->userdata('sess'));
		// print_r($this->session->userdata('profil'));
		// echo $this->session->has_userdata('profil');
	}

	function destroy(){
		// echo $this->session->unset_userdata('profil');
		$this->session->sess_destroy();
		$this->session->set_flashdata('juhdi','value');
		$this->load->view('v_home');
		// redirect(base_url('welcome3/session/liat'));

	}

	function cek(){
		if ($this->session->userdata('data')) {
			echo "ada";
		}else{
			echo "tidak";
		}
		
	}
}
