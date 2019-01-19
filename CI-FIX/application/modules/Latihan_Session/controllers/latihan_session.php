<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan_session extends MX_Controller {

	function __construct(){
		$this->load->model('M_data');
	}

	public function index(){
		$data= array(
			'data'=>  $this->M_data->get_mhs()->result(),
			'field'=>  $this->M_data->get_mhs()->field_data(),

		);
		// print_r($data['field']);
		$this->load->view('v_tabel',$data);
	}
}
