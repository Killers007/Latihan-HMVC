<?php
/** @property ModulM $ModulM */
class Modul extends MY_Controller{
    private $role = 'modul';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Modul_m','ModulM');
        $this->load->model('Akses_superadmin','AksesSuperadmin');
    }
    
    public function index() {
        $aksi_modul = 'baca';
        if (!$this->acl->role_check($this->role,'BACA')) {
            show_error('Tidak memiliki otoritas',401);
        }
       
        if($this->input->is_ajax_request()&& isset($_GET['draw'])){
            $request = $this->input->get();
            $data = $this->ModulM->getDataGrid($request);
            echo json_encode($data);
        }else{
            $this->load->library('form_validation');
            $this->template->render('index',array(),$this->role,FALSE);
	}
    }
    
    public function simpan($id=null) {
        $aksi_modul = 'tulis';
        if (!$this->acl->role_check($this->role,'TULIS')) {
            if($this->input->is_ajax_request())
                echo '{"simpan":false,"pesan":"Anda tidak memiliki otorisasi untuk menambah data !"}';
            else
           show_error('Tidak memiliki otoritas',401);
        }else{
            $model = $this->ModulM->getByPrimary($id);
            $id = $model['modul'];
            $this->load->library('form_validation');
            $this->form_validation->set_rules($this->ModulM->rules());
            if($this->input->post()){
                $model = $this->input->post();
                $this->form_validation->set_data($model);
                if ($this->form_validation->run()){
                    if($id !== null){
                        $this->db->trans_begin();
                        $this->ModulM->update($id,$model);
                        // $this->AksesSuperadmin->perbaharui($id,$model);
                        if ($this->db->trans_status() === FALSE)
                            $this->db->trans_rollback();
                        else
                            $this->db->trans_commit();
                        echo '{"simpan":true,"pesan":"Modul berhasil diperbaharui !"}';
                    }else{
                        $this->db->trans_begin();
                        $this->ModulM->insert($model);
                        // $this->AksesSuperadmin->tambah($model);
                        if ($this->db->trans_status() === FALSE)
                            $this->db->trans_rollback();
                        else
                            $this->db->trans_commit();
                        echo '{"simpan":true,"pesan":"Modul berhasil ditambahkan !"}';
                    }
                }else{
                    $data['simpan'] = false;
                    $data['pesan'] = validation_errors();
                    echo json_encode($data);
                }
            }else{
                $data['model'] = $model;
                $data['simpan'] = true;
                echo json_encode($data);
            }
        }
    }
    
    public function hapus(){
        $aksi_modul = 'hapus';
         if (!$this->acl->role_check($this->role,'HAPUS')){
            if($this->input->is_ajax_request())
                echo '{"hapus":false,"pesan":"Anda tidak memiliki otorisasi untuk menghapus !"}';
            else
            show_error("",401);
        }else{
            if($this->input->is_ajax_request()){
                $id = $this->input->get('id');
                $this->ModulM->delete($id);
                // $this->AksesSuperadmin->hapus($id);
                if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    echo '{"hapus":false,"pesan":"Modul gagal dihapus !"}';
                }else{
                    $this->db->trans_commit();
                    echo '{"hapus":true,"pesan":"Modul berhasil dihapus !"}';                        
                }
            }else{
                $ids = $this->input->post('ids');
                $this->ModulM->delete($ids);
                redirect (base_url('modul'));
            }
        }
    }
    
}
