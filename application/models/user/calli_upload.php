<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Calli_upload extends CI_Model{
	
	public function calli_insert($user_name,$pic_path){
		$data = array(
			'user_name' =>$user_name,
			'pic_path' =>$pic_path,
			'bool_change' => 0,
			'time' => date("Y-m-d H:i:s"),
		);
		
		if($this->db->insert('upload_calligraphy',$data)){
			echo "<script>alert('恭喜你，上传成功!');</script>";
			header('Refresh:0.1; url='.site_url('banner/to_personal').'/'.$user_name);
		}
		else{
			echo "<script>alert('对不起，上传失败!');history.go(-1);</script>";
		}
	}
	
	
	
	/**
	 * 这是用户个人主页点击事件删除用户上传的音乐
	 */
	public function calli_upload_del($id){
		$this->db->where('id',$id);
		$data = $this->db->select('pic_path,user_name')->get('upload_calligraphy')->result_array();
		
		$this->db->where('id',$id);
		if($this->db->delete('upload_calligraphy')){
			$this->db->where('upload_id',$id);
			if($this->db->delete('calligraphy')){
				if(unlink($data[0]['pic_path'])){
					echo "<script>alert('删除书画成功!');</script>";
				}
				header('Refresh:0.1; url='.site_url('banner/to_personal').'/'.$data[0]['user_name']);
			}
			
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	}
}