<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_data extends CI_Model {

   function get_mhs(){
        return $this->db->get('mhs');
   }

}