<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

	
	public function __construct(){
		parent::__construct();
		if (!$this->acl->is_login()) {
			redirect(base_url('login'));
		}
	}

	public function index(){
		$data = array(
			'user' => $this->db->get('silab_m_user')->num_rows(),
			'bahan'=>$this->db->get('silab_m_bahan')->num_rows(),
			'inventaris'=>$this->db->get('silab_m_inventaris')->num_rows(),
			'ualat'=>$this->db->get('silab_m_usulan_alat')->num_rows(),
		);
		$this->template->render('index',$data,'Welcome',FALSE);
	}
}
