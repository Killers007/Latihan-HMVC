<?php

class Akses_superadmin extends MY_Model {

    protected $table = 'kemahasiswaan_hak_akses';
    protected $pK = 'role';
    
    function tambah($data) {
        $hak = array("BACA","HAPUS","TULIS","UPDATE");
        $role="superadmin";
        $insert = array();
        foreach ($hak as $value) {
            $insert[] = array('role' => $role, 'modul' => $data['modul'], 'hak' => $value);
       }
        return $this->db->insert_batch($this->table, $insert);
    }

    function perbaharui($lama,$baru) {
        $data = array('modul' => $baru['modul']);
        $this->db->where('modul', $lama);
        $this->db->update($this->table, $data); 
    }
    
    function hapus($modul) {
        $data = array('modul'=>$modul);
        $this->db->where($data);
        return $this->db->delete($this->table);
    }

}
