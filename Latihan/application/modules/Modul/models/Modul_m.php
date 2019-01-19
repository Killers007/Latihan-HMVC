<?php

class Modul_m extends MY_Model {
    protected $table = 'silab_modul';
    protected $pK = 'modul';
    public $modul;
    
    public function rules(){
        $rules = array(
            array('field'=>'modul', 'label'=>'Modul',
                'rules'=>array(
                    'required',
                    array('exist',array(Modul_m::model(), 'exist'))
                ),
                'errors'=>array('exist'=>"%s sudah terdaftar")
            ),
        );
        return $rules;
    }
    
    public function exist($value){
        $this->db->where($this->pK,$value);
        return !($this->db->count_all_results($this->table) > 0);
    }
    
    public function relations(){
        return array();
    }
}
