<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hak_akses extends MX_Controller {

	private $role='hak_akses';

	public function __construct(){
		parent::__construct();
		if (!$this->acl->role_check($this->role,'BACA')) {
			$this->acl->no_access();
		}
	}

	public function index(){
		foreach ($this->db->get('silab_ref_role')->result() as  $key => $value) {
			foreach ($this->db->get('silab_modul')->result()  as $keys => $values) {
				foreach ($this->db->get_where('silab_hak_akses',array('modul' => $values->modul,'role'=> $value->id))->result()  as $keyss => $valuess) {
					$datas[$value->id][$values->modul][$keyss]=$valuess->hak;
				}
			}
		}

		$data=array(
			'role' => $this->db->get('silab_ref_role'),
			'data' => $datas,
			'modul' => $this->db->get('silab_modul'),
		);
		$this->template->render('index',$data,"Hak Akses",FALSE);
	}

	public function simpan(){
		$data=$this->input->post();
		$id=$data['id'];
		unset($data['id']);
		$arr=array();
		$temp=array();

		foreach ($data as $key => $value) {
			foreach ($value as $keys => $values) {
				$temp['role']=$id;
				$temp['modul']=$key;
				$temp['hak']=$values;
				$arr[]=$temp;
			}
		}
		
		// echo "<pre>";
		// print_r($arr);
		// echo "</pre>";

		$this->db->delete('silab_hak_akses',array('role'=> $id));
		$this->db->insert_batch('silab_hak_akses',$arr);
		redirect('hak_akses');
	}

	public function show(){

		$data = array('1' => array(),'2' => array(),'3' => array(),'4' => array());
		foreach ($this->db->get('silab_ref_role')->result() as  $key => $value) {
			foreach ($this->db->get('silab_modul')->result()  as $keys => $values) {
				foreach ($this->db->get_where('silab_hak_akses',array('modul' => $values->modul,'role'=> $value->id))->result()  as $keyss => $valuess) {
					$data[$value->id][$values->modul][$keyss]=$valuess->hak;
					// $data[$key][$keys][0]='anjay';
				}
			}
		}
		
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

}
