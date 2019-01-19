<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengelola extends MX_Controller {

	private $role='Pengelola';
	private $table='silab_m_pengelola';
	private $primary_key='idpengelola';

	public function __construct(){
		parent::__construct();
		$this->load->model('pengelola_m','PengelolaM');
	}

	public function index(){
		if (!$this->acl->role_check($this->role,'BACA')) {
			show_error('Tidak memiliki otoritas',401);
		}
		if($this->input->is_ajax_request()){
			$request = $this->input->get();
			$data = $this->PengelolaM->getDataGrid($request);
			echo json_encode($data);
		}else{
			$this->load->library('form_validation');
			$this->template->render('index',array(),$this->role,FALSE);
		}
	}

	public function hapus_data()
	{
		$this->db->where($this->primary_key,$this->input->post('id'));
		$this->db->delete('silab_m_pengelola');
	}

	public function edit($id)
	{
		$model = new pengelola_m();
		$model = $model->getByPrimary($id,false);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($model->rules());
		if($this->input->post()){
			$model->setAttribute($this->input->post());
			if ($this->form_validation->run()){
				$insert = $model->getArrayProperty();
				$lastId = $model->update($id,$insert);
				redirect(base_url('pengelola'));
			}
		}
		$this->template->render('form',array('model' => $model ),$this->role,FALSE);
	}

	public function tambah()
	{
		$model = new pengelola_m();
		// $model = $model->getByPrimary('anjay',false);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($model->rules());
		if($this->input->post()){
			$model->setAttribute($this->input->post());
			if ($this->form_validation->run()){
				$insert = $model->getArrayProperty();
				// $model->trans_start(FALSE);
				$lastId = $model->insert($insert);
				// $model->trans_complete();
				$this->db->error();
				redirect(base_url('pengelola'));
			}
		}
		$this->template->render('form',array('model' => $model ),$this->role,FALSE);
	}


}
