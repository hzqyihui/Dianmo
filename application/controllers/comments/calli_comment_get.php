<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是从前台获取书画评论，再加载模型传到数据库
 * */
class Calli_comment_get extends CI_Controller{
	
	public function get_comment(){
		session_start();
		$comment = $this->input->post('comment');
		$user_name = $this->input->post('user_name');
		$object_id = $this->input->post('object_id');
		//var_dump($_SESSION['last_time']);
		if(empty($user_name)){
			echo "<script>alert('请登录了再评论');history.go(-1);</script>";
		}else if((time() - $_SESSION['last_time']) > 2000){
			$_SESSION['username'] = NULL;
			echo "<script>alert('登录已超时,请重新登录');history.go(-1);</script>";
		}else{
			if(empty(trim($comment))){
				echo "<script>alert('要评论就必须填写内容');history.go(-1);</script>";
			}else{
				$this->load->model('comments/calli_comment');
				$this->calli_comment->insert_comment($comment,$user_name,$object_id);
			}
		}
		
		
	}
}