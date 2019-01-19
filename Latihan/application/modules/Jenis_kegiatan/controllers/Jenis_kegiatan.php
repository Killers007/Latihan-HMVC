<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_kegiatan extends MX_Controller {

	private $role='rkegiatan';
	private $modul='Jenis Kegiatan';

	public function __construct(){
		parent::__construct();
		if (!$this->acl->role_check($this->role,'BACA')) {
			$this->acl->no_access();
		}
	}

	public function _example_output($output = null){
		$this->template->render('index',(array)$output,$this->modul);
	}

	public function index(){
		$this->__READ();
	}

	public function __READ(){
		try{
			$crud = new grocery_CRUD();
			// $crud->set_theme('datatables');
			$crud->set_table('silab_ref_jenis_kegiatan');
			$crud->set_subject($this->modul);
			(!$this->acl->role_check($this->role,'BACA'))?$crud->unset_read():'';
			(!$this->acl->role_check($this->role,'TULIS'))?$crud->unset_add():'';
			(!$this->acl->role_check($this->role,'HAPUS'))?$crud->unset_delete():'';
			(!$this->acl->role_check($this->role,'EDIT'))?$crud->unset_edit():'';
			$output = $crud->render();
			$this->_example_output($output);
		}catch(Exception $e){
			show_error($e->getMessage()/*.' --- '.$e->getTraceAsString()*/);
		}
	}

}
