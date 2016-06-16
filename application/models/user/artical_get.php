<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得文章相关的数据
 * */
class Artical_get extends CI_Model{
	
	/** 
	 * 这里二级页面发出id请求对数据库表进行操作。
	 */
	public function artical_detail($id){
		$this->db->select('name,writer,artical');
		$data = $this->db->where('id',$id)->get('upload_artical')->result_array();
		return $data;
	}
	
	/**
	 * 这里是用户登录之后，从数据库取出用户上传的作品
	 */
	 public function artical_list($name){
		$this->db->select('id,name,time');
		$this->db->where('user_name',$name);
		$data = $this->db->get('upload_artical')->result_array();
		return $data;
	}
	 
	 /**
	 * 这里是陌上遗风进入作者页面后 显示的他的诗歌
	 */
	 public function artical_page_list($writer_id,$perpage,$offset){
		$this->db->select('id,name,time');
		$this->db->limit($perpage,$offset);
		$this->db->where('writer_id',$writer_id);
		$data = $this->db->get('artical')->result_array();
		return $data;
	}
}
