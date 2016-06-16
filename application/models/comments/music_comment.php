<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Music_comment extends CI_Model{
	
	public function get_comment($id){
		$this->db->select('comments_music.comment,comments_music.time,comments_music.u_name,user.u_pic_path');
		$this->db->where('object_id',$id);
		$this->db->from('comments_music');
		$this->db->join('user','comments_music.u_name = user.u_name');
		$data = $this->db->get()->result_array();
		return $data;
	}
	
	public function insert_comment($comment,$user_name,$object_id,$object){
		$data = array(
			'comment' => $comment,
			'u_name' => $user_name,
			'object_id' => $object_id,
			'object' =>$object,
			'time' => date("Y-m-d H:i:s"),

		);
		if($this->db->insert('comments_music',$data)){
			echo "<script>alert('恭喜你，评论成功!');</script>";
			header('Refresh:0.1; url='.site_url('/music/get_out/music_adv').'/'.$object_id);
		}
		else{
			echo "<script>alert('对不起，评论失败!');history.go(-1);</script>";
		}
	}
}