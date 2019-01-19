<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*---------------------------------------------------------------------
	Class privilege ,generate all request linked to the access controll
----------------------------------------------------------------------*/

class Acl {

	private $CI = NULL;
	
    public function __construct(){
		$this->CI= & get_instance();
	}
	
	public function role_check($modul, $aksi = null)
	{
		$q 	= $this->CI->db->get_where('silab_hak_akses',array('modul'=> $modul,'hak'=>$aksi,'role'=>$this->CI->session->userdata('id')));
		if ($q->num_rows() > 0)
			return true;
		else 
			return false; 
	}
	
	public function no_access()
	{
	    show_error('Anda Tidak memiliki otoritas');
	}

	
	
	
}
