<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得音乐相关的数据
 * */
class Music_get extends CI_Model{
	/**
	 * 这是用户主页页面发出请求进入对应的三级页面
	 */
	 public function music_detail($id){
	 	$this->db->select('id,pic_path,music_path,music_name,singer,writer,composer,arranger,lyric');
		$this->db->where('id',$id);
		$data = $this->db->get('upload_music')->result_array();
		return $data;
	 }
	 
	/**
	 * 这是用户主页页面发出请求进入对应的三级页面
	 */
	 public function music_list($name){
	 	$this->db->select('id,music_name,time');
		$data = $this->db->where('user_name', $name)->get('upload_music')->result_array();
		return $data;
	 }
	 
	 /**
	 * 这里是用户登录之后，从数据库取出用户上传的作品
	 */
	 public function music_page_list($name,$perpage,$offset){
		$this->db->select('id,music_name,time');
		$this->db->limit($perpage,$offset);
		$this->db->where('user_name',$name);
		$data = $this->db->get('upload_music')->result_array();
		return $data;
	}
}
