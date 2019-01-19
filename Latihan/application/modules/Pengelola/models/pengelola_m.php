<?php

class Pengelola_m extends MY_Model {

    protected $table = "silab_m_pengelola";
    protected $pK = "idpengelola";

    function relations() {
        return array(
            'lab'=>array(self::HAS_ONE,'silab_m_lab','kode_lab',$this->table.'.kode_lab'),
            'status'=>array(self::HAS_ONE,'silab_ref_status','kode_status',$this->table.'.status_kepegawaian'),
        );
    }


    public function rules($scenario = null) {
        $rules = array(
            array('field' => 'nama', 'label' => 'Nama', 'rules' => 'required'),
            array('field' => 'status_kepegawaian', 'label' => 'Status Kepegawaian', 'rules' => 'required'),

        );
        return $rules;
    }

    public function getLab(){
    	$return=array();
        $this->db->select('kode_lab,nama_lab');
        $this->db->from('silab_m_lab');
        $r = $this->db->get();
        foreach($r->result() as $row){
            $return[$row->kode_lab] = $row->kode_lab.' - '.$row->nama_lab;
        }
        return $return;
    }

    public function getKepegawaian(){
    	$return=array();
        $this->db->select('kode_status,status_pegawai');
        $this->db->from('silab_ref_status');
        $r = $this->db->get();
        foreach($r->result() as $row){
            $return[$row->kode_status] = $row->kode_status.' - '.$row->status_pegawai;
        }
        return $return;
    }

    
}
