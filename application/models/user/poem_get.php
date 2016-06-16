<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得音乐相关的数据
 * */
class Poem_get extends CI_Model{
	/*
	 * 这里二级页面发出id请求对数据库表进行操作。
	 * */
	public function poem_detail($name){
		$this->db->select('name,writer,poem,translation,appreciate,note');
		$data = $this->db->where('user_name',$name)->get('upload_poem')->result_array();
		return $data;
	}
	
	/**
	 * 这是音乐二级页面发出请求进入对应的三级页面
	 */
	 public function poem_list($name){
	 	$this->db->select('id,name,time');
		$data = $this->db->where('user_name', $name)->get('upload_poem')->result_array();
		return $data;
	 }
	 
	 /**
	 * 这里是诗词鉴赏进入作者页面后 显示的他的诗歌
	 */
	 public function poem_page_list($writer_id,$perpage,$offset){
		$this->db->select('id,name,time');
		$this->db->limit($perpage,$offset);
		$this->db->where('writer_id',$writer_id);
		$data = $this->db->get('poem')->result_array();
		return $data;
	}
	 
	  /**
	 * 这里是诗词鉴赏作者的个人信息
	 */
	 public function poem_writer_list($writer_id){
	 	$this->db->select('id,name,time');
		$data = $this->db->where('writer_id', $writer_id)->get('poem')->result_array();
		return $data;
	 }
	
}
