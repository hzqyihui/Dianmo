<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得音乐相关的数据
 * */
class Music_get extends CI_Model{
	/**
	 * 这里是根据点赞表，利用简单排序得出七首最受欢迎歌曲到页面
	 */
	public function musicget(){
		
		$this->db->select('id,music_name,singer');
		$this->db->limit(7);
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('music')->result_array();
		return $data;
	}
	
	/**
	 * 这里是根据点赞表，利用简单排序得出一个个最受欢迎音乐人
	 */
	public function musicget_singer_one(){
		$this->db->select('admire.user_name,user.u_pic_path,user.u_name');
		$this->db->limit(1);
		$this->db->from('admire');
		$this->db->order_by('all_admire_num', 'DESC');
		$this->db->join('user','admire.user_name = user.u_name');
		$data = $this->db->get()->result_array();
		return $data;
	}
	
	/**
	 * 这里是根据点赞表，利用简单排序得出七个最受欢迎音乐人
	 */
	public function musicget_singer(){
		$this->db->select('admire.user_name,user.u_pic_path,user.u_name');
		$this->db->limit(6);
		$this->db->from('admire');
		$this->db->order_by('all_admire_num', 'DESC');
		$this->db->join('user','admire.user_name = user.u_name');
		$data = $this->db->get()->result_array();
		return $data;
	}
	
	/**
	 * 这里是根据点赞表，利用简单排序得出18首音乐
	 */
	public function musicget_list(){
		$this->db->select('id,music_name,singer');
		$this->db->limit(18);
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('music')->result_array();
		return $data;
	}
	
	/**
	 * 这里是根据点赞表，利用简单排序得出18首最新音乐
	 */
	public function musicget_new_song(){
		$this->db->select('id,music_name,pic_path,singer,lyric');
		$this->db->limit(6);
		$this->db->order_by('time', 'DESC');
		$data = $this->db->get('music')->result_array();
		return $data;
	}
	
	/**
	 * 这是音乐三级页面实现下载功能所需要的模型
	 */
	 public function music_download($id){
	 	$this->db->select('music_path,music_name');
		$this->db->where('id',$id);
		$data = $this->db->get('music')->result_array();
		return $data;
	 }
	 
	


	 /**
	 * 这是音乐二级页面发出请求进入对应的三级页面
	 */
	 public function music_detail($id,$num){
	 	
	 	$data = $this->db->select('id,upload_id,pic_path,music_path,music_name,singer,writer,composer,arranger,lyric,admire_num')->where('id',$id)->get('music')->result_array();
		if($num == 1){
			$data_2 = array(
		 		'admire_num' => $data[0]['admire_num']+$num,
			);
			$this->db->where('id',$id)->update('music',$data_2);
			$data_3 = $this->db->select('user_name')->where('id',$data[0]['upload_id'])->get('upload_music')->result_array();
			$data_4 = $this->db->select('all_admire_num')->where('user_name',$data_3[0]['user_name'])->get('admire')->result_array();
			$data_5 = array(
		 		'all_admire_num' => $data_4[0]['all_admire_num']+$num,
			);
			$this->db->where('user_name',$data_3[0]['user_name'])->update('admire',$data_5);		
		}
		return $data;
	 }
	 
	 
	 
	 
}
