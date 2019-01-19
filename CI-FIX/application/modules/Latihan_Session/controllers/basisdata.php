<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basisdata extends MX_Controller {

	function __construct(){
		if (!empty($this->session->userdata('aa'))) {
			echo "ada";
			
		}else{
			echo "tydact";

		echo $this->session->has_userdata('aa');
		}
	}

public function index()
	{
		// $data=array('value' => $this->db->get('akun')->row(2));
		// $data=array('value' => $this->db->get('akun')->last_row());
		// $data=array('value' => $this->db->get('akun')->row_array(2));
		$data=array('value' => $this->db->get('akun')->result('array'));
		// $data=array('value' => $this->db->get('akun')->result_array());
		// $data=array('value' => $this->db->get('akun')->num_rows());
		// $this->load->view('v_home',$data);

	//  echo 'asas'/'/';
	//  $this->session->userdata();
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	function session(){
		
		$this->session->set_userdata(array('anjay' => 'mantap', ));
		$this->session->set_userdata('bb', 'mantap');
		// echo $this->session->has_userdata('aa');
		echo "<pre>";
		print_r($this->session->userdata());
		echo "</pre>";
	}

	function destroy(){
		$this->session->sess_destroy();
		echo "<pre>";
		print_r($this->session->userdata());
		echo "</pre>";
		// echo $this->session->has_userdata('aa');
		// echo $this->session->userdata('aa');
	}
}