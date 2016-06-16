<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Poem_index extends CI_Model{
	
	/**
	 * 这是首页中对丝竹古韵从后台取数据到前台
	 * */
	public function getsome(){
		$this->db->select('id,name,writer');
		$this->db->limit(16);
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('poem')->result_array();
		return $data;
		
	}
}