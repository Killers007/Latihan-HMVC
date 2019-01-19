<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_validation extends MX_Controller {

	function __construct(){
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('umur', 'Umur', 'trim|required|min_length[5]|max_length[12]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_form');
			// show_error('403',404);
			// show_404();
			// $this->output->set_status_header(403);
		}else{
			$this->load->view('v_form');
		}
	}

}
