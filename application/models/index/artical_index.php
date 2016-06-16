<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Artical_index extends CI_Model{
	
	/**
	 * 这是首页中对陌上遗风从后台取数据到前台
	 * */
	public function getsome(){
		$this->db->select('id,artical,name,writer');
		$data = $this->db->get('artical')->result_array();
     	return $data;
		
	}
}