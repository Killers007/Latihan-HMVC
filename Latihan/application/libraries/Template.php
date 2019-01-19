<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template 
{
	
	protected $CI;
	function __construct(){
		$this->CI =& get_instance();
	}
	
	public function render($view='',$data=array(),$title='',$active=true){
		$CI =& get_instance();
		$data['title']=$title;
		$data['active']=$active;
		$this->CI->load->view('v_header',$data);
		$this->CI->load->view('v_sidebar');
		$this->CI->load->view($view);
		$this->CI->load->view('v_footer');
	}
}