<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Killers_crud {

	private $CI = NULL;
	private $relation=array();
	private $output=array();
	private $primary_key;
	private $field ;
	private $menu;
	private $relasi;
	private $table;
	private $rules;
	private $access =array(
		'insert' => TRUE,
		'update' => TRUE,
		'delete' => TRUE,
	);

	public function __construct(){
		$this->CI= & get_instance();
	}

	public function _initialize_table(){
		$this->CI->db->select(array('*'));
		$this->CI->db->from($this->table);
		// foreach ($this->relation as $value) {
		// 	# code...
		// }
		$this->CI->db->join('silab_ref_status lab','lab.kode_status='.$this->table.'.status_kepegawaian');
		// $this->CI->db->join('silab_m_lab A','A.kode_lab='.$this->table.'.kode_lab');
		$data=$this->CI->db->get();
		$data=array($data->field_data(),$data->result());
		// echo "<pre>";
		// echo $this->CI->db->last_query();
		// header('Content-Type: application/json');
		echo json_encode($data);
		// print_r($data);
		// echo "</pre>";
	}

	public function add_relation($field_ref,$table_ref,$id,$name)
	{
		$this->relation['relasi'][]= array($field_ref,$table_ref,$id,$name);
	}

	public function unset_insert()
	{
		$this->access['insert']=FALSE;
	}

	public function unset_update()
	{
		$this->access['update']=FALSE;
	}


	public function set_rules($field,$label,$rules,$arr=array())
	{
		$array=array(
			'field'=> $field,
			'label'=> $label,
			'rules'=> $rules,
			'errors'=> $arr,
		);
		$this->rules[]=$array;
	}

	public function get_rules(){
		print_r($this->rules);
	}

	public function unset_delete()
	{
		$this->access['delete']=FALSE;
	}

	public function get_relation()
	{
		return $this->relation;
	}

	public function get_primary_key()
	{
		return $this->primary_key;
	}

	public function __set_primary_key($str)
	{
		$field=$this->CI->db->field_data($this->table);
		foreach ($field as $value) {
			if ($value->primary_key==1) {
				$this->primary_key=$value->name;
			}
		}
	}

	public function set_table($str)
	{
		$this->table=$str;
		$this->__set_primary_key($str);
		
	}

	public function get_table()
	{
		return $this->table;
	}

	public function auto_validation(){
		foreach ($this->CI->db->get($this->table)->field_data() as $value) {
			$this->CI->form_validation->set_rules($value->name, str_replace('_', ' ', strtoupper($value->name)), 'trim|required|max_length['.$value->max_length.']');
		}
		// return $this->CI->db->get($this->table)->field_data();
	}

	public function get_field(){
		echo json_encode($this->CI->db->get($this->table)->field_data());
	}

	public function get_ajax_relation($data){
		$this->CI->db->select(array($data['id'],$data['nama']));
		echo json_encode($this->CI->db->get($data['tabel'])->result());
	}

	public function add_data($data){
		if (empty($this->rules)) {
			$this->auto_validation();
		} else {
			$this->CI->form_validation->set_rules($this->rules);
		}

		if($this->CI->form_validation->run()== FALSE){
			$response=array();
			foreach ($this->CI->db->get($this->table)->field_data() as $value) {
				array_push($response, form_error($value->name));
			}
			echo json_encode($response);
		}else{
			$this->CI->db->insert($this->table,$data); 
		}
	}

	public function update_data($data){
		if (empty($this->rules)) {
			$this->auto_validation();
		} else {
			$this->CI->form_validation->set_rules($this->rules);
		}
		
		if($this->CI->form_validation->run()== FALSE){
			$response=array();
			foreach ($this->CI->db->get($this->table)->field_data() as $value) {
				array_push($response, form_error($value->name));
			}
			echo json_encode($response);
		}else{
			$this->CI->db->where($this->primary_key,$data[$this->primary_key]);
			$this->CI->db->update($this->table,$data);
		}
	}

	public function delete_data($id){
		$this->CI->db->where($this->primary_key,$id);
		$this->CI->db->delete($this->table);
	}

	public function detail($id){
		$data=$this->CI->db->get_where($this->table,array($this->primary_key => $id))->row();
		echo json_encode($data);
	}

	public function output()
	{
		$this->output = array(
			'primary_key' => $this->primary_key,
			'field' => $this->CI->db->get($this->table)->field_data(),
			'menu' => $this->CI->db->get('menu_crud')->result(),
			'relasi' => (object)$this->relation,
			'access' => $this->access
		);
		return $this->output;
	}	
}
