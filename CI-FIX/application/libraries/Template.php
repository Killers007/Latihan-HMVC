<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template 
{
	
	protected $CI;
	function __construct(){
		$this->CI =& get_instance();
	}
	
	public function render($view='',$data=array()){
		$CI =& get_instance();
		$this->CI->load->view('template/v_header',$data);
		$this->CI->load->view('template/v_sidebar');
		$this->CI->load->view($view);
		$this->CI->load->view('template/v_footer');
	}
}