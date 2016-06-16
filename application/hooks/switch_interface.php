<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Switch_interface extends CI_Controller{
	private $_CI;

	public function __construct() {
		$this -> _CI = & get_instance();
	}

	public function index() {
		$this -> _switch();
	}
	
	public function _switch(){
		$switch = $this -> _CI->config->item('system_switch');
		if (strtolower($switch) == "off") {
			echo "系统正在维护中...";
			exit ;
		}
	}
}
