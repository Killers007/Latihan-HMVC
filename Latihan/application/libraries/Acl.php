<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*---------------------------------------------------------------------
	Class privilege ,generate all request linked to the access controll
	----------------------------------------------------------------------*/

	class Acl {

		private $CI = NULL;

		public function __construct()
		{

			$this->CI= & get_instance();
		}

		public function role_check($modul, $aksi = null)
		{
			if ($this->is_login()) {
				$q 	= $this->CI->db->get_where('silab_hak_akses',array('modul'=> $modul,'hak'=>$aksi,'role'=>$this->CI->session->userdata('login')->id));
				if ($q->num_rows() > 0)
					return true;
				else 
					return false; 
			}else{
				redirect(base_url('login'));
			}

		}

		public function is_login()
		{
			$q 	= $this->CI->session->has_userdata('login');
			if ($q)
				return true;
			else 
				return false; 
		}

		public function get_menu()
		{
			// $this->CI->db->distinct('modul');
			$this->CI->db->select('modul');
			$result=array();
			$q 	= $this->CI->db->get_where('silab_hak_akses',array('hak' => 'BACA','role'=>$this->CI->session->userdata('login')->id));
			
			foreach ($q->result_array() as $key => $value) {
				$result[]=$value['modul'];
			}
			return $result;
		}

		public function logout()
		{
			$this->CI->session->sess_destroy();
		}

		public function no_access()
		{
	    // $this->CI->load->view('403');
			// show_404();
			show_error('You don\'t have authorize in this module, your action is criminal, we will trace your crime','Error',401);
			// show_error('heading', '$message', 'error_404', 404);
	    // die();
		}




	}
