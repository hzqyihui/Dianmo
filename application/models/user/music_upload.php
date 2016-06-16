<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Music_upload extends CI_Model{
	
	public function music_insert($user_name,$music_name,$user_pic_path,$singer,$writer,$composer,$arranger,$lyric,$music_path){
	 	$data = array(
	 		'user_name' =>$user_name,
			'music_name' => $music_name,
			'pic_path' =>$user_pic_path,
			'music_path'=>$music_path,
			'singer' => $singer,
			'writer' => $writer,
			'composer' => $composer,
			'arranger' => $arranger,
			'lyric' => $lyric,
			'time' => date("Y-m-d H:i:s"),
		);
		
		if($this->db->insert('upload_music',$data)){
			//move_uploaded_file($big_pic_info['tmp_name'],$big_path);
			echo "<script>alert('恭喜你，上传成功!审核通过后可被搜索到!');</script>";
			header('Refresh:0.1; url='.site_url('banner/to_personal').'/'.$user_name);
		}
		else{
			echo "<script>alert('对不起，上传失败!');history.go(-1);</script>";
		}
	 }
	
	/**
	 * 这是用户个人主页点击事件删除用户上传的音乐
	 */
	public function music_upload_del($id){
		$this->db->where('id',$id);
		$data = $this->db->select('music_path,user_name')->get('upload_music')->result_array();
		
		$this->db->where('id',$id);
		if($this->db->delete('upload_music')){
			$this->db->where('upload_id',$id);
			if($this->db->delete('music')){
				if(unlink($data[0]['music_path'])){
					echo "<script>alert('删除音乐成功!');</script>";
				}
				header('Refresh:0.1; url='.site_url('banner/to_personal').'/'.$data[0]['user_name']);
			}else{
				$this->db->where('upload_id',$id);
				if(unlink($data[0]['music_path'])){
					echo "<script>alert('删除总表失败!删除上传表音乐成功');</script>";
				}
				header('Refresh:0.1; url='.site_url('banner/to_personal').'/'.$data[0]['user_name']);
			}
			
		}else{
			echo "<script>alert('抱歉,删除失败!');history.go(-1);</script>";
		}
	}
	
	
}

