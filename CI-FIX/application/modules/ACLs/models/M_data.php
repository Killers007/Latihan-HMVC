<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_data extends CI_Model {

   function get_mhs(){
        return $this->db->get('mhs');
   }

   function get_m_bahan_sub(){
        return $this->db->get('silab_m_bahan_sub');
   }

   function get_m_fakultas(){
        return $this->db->get('silab_m_fakultas');
   }

}