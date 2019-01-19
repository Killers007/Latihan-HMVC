<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_Grocery extends MY_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('grocery_CRUD'));
	}

	public function _example_output($output = null){
		$this->template->render('v_dashboard',(array)$output);
	}

	public function index(){
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function objek(){
		$data=[
			[
				'nim' => '1611016210001',
				'nama' => 'Juhdi'
			],
			[
				'nim' => '1611016210001',
				'nama' => 'Amat'
			],
			[
				'nim' => '1611016210001',
				'nama' => 'Utuh'
			],
		];
		echo "<pre>";
		print_r((object)$data);
		echo "</pre>";
	}

	public function lab(){
		try{
			$crud = new grocery_CRUD();
		
			// $crud->set_theme('flexigrid');
			$crud->set_table('silab_m_lab');
			$crud->set_subject('LAB');
			$crud->set_relation('prodi_pengelola','silab_m_prodi','namaps');
			$crud->unset_read();
			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function pengelola(){
		try{
			$crud = new grocery_CRUD();
			$this->config->load('grocery_crud');
			$this->config->set_item('grocery_crud_dialog_forms',true);
			// $this->config->set_item('grocery_crud_default_per_page',10);
			// $crud->set_theme('datatables');

			$crud->set_table('silab_m_pengelola');
			$crud->set_subject('Pengelola');
			$crud->set_relation('kode_lab','silab_m_lab','nama_lab');
			$crud->set_relation('status_kepegawaian','silab_ref_status','status_pegawai');
			$crud->display_as('idpengelola','ID Pengelola')->display_as('status_kepegawaian','Status Kepegawaian');
			$crud->set_rules("kode_lab", "Kode Lab", "required");

			// $crud->set_field_upload('file_url','assets/uploads/files');
			// $crud->required_fields('kode_lab');
			// $crud->columns('no_hp','email');

			// $crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			// $crud->unset_columns('jabatan','email');

			// $crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			// $crud->unset_add();
			// $crud->unset_delete();

			// $crud->callback_column('idpengelola',array($this,'_callback'));

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function _callback($value, $row){
		return $value.' &euro;';
	}

}
