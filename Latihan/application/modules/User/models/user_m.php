<?php

class User_m extends MY_Model {

    protected $table = "silab_m_user";
    protected $pK = "id_user";
 
    function relations() {
        return array(
            'lab'=>array(self::HAS_ONE,'silab_m_lab','kode_lab',$this->table.'.kode_lab'),
            // 'role'=>array(self::HAS_ONE,'silab_ref_role','role',$this->table.'.role'),
            // 'prodi'=>array(self::HAS_ONE,'silab_m_prodi','kode_ps',$this->table.'.prodi'),
        );
    }


     public function rules($scenario = null) {
        // $rules = array(
        //     array('field' => 'nama', 'label' => 'Nama', 'rules' => 'required'),

        // );
        // return $rules;
    }
    
}
