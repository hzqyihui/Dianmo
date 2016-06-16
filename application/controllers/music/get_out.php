<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是三级页面发出动作，请求数据库
 * */
class Get_out extends CI_Controller{
	
	/**
	 * 这是音乐二级页面精选好歌的控制器
	 */
	public function music_adv(){
		$id = $this->uri->segment(4);
		$this->load->model('three/music_get');
		
		$num = 1;
		$data['detail'] = $this->music_get->music_detail($id,$num);
		
		//对评论进行分页
		$this->load->library('pagination');
		$perpage = 2;
		
		$total_rows = $this->db->where('object_id',$id)->count_all_results('comments_music');
		//echo $total_rows; die;
		$config['base_url'] = site_url('music/get_out/music_adv').'/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 5;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(5);
		$this->db->limit($perpage,$offset);
		$this->load->model('comments/music_comment');
		$data['comment'] = $this->music_comment->get_comment($id);
		$data['id'] = $id;
		//var_dump($data);die;
		$this->load->view('three/music_thr', $data);
	}
	
	/**
	 * 这是音乐三级页面实现文件下载功能
	 */
	public function music_download(){
		$id = $this->uri->segment(4);
		header("Content-type:text/html;charset=utf-8");
		$this->load->model('three/music_get');
	  	$data = $this->music_get->music_download($id);
		
	     $file_sub_path = $data[0]['music_path'];
		// var_dump($file_sub_path);die;
	     $file_path=$file_sub_path;
	     //首先要判断给定的文件存在与否
	     if(!file_exists($file_path)){
	         echo "没有该文件文件";
	         return ;
	     }
		 $file_name = basename($file_path);
	     $fp=fopen($file_path,"r");
	     $file_size=filesize($file_path);
	     //下载文件需要用到的头
	     Header("Content-type: application/octet-stream"); 
	     //Header("Content-type: audio/mp3");
	     Header("Accept-Ranges: bytes"); 
	     Header("Accept-Length:".$file_size); 
	     Header("Content-Disposition: attachment; filename=".$file_name); 
	     $buffer=1024;
	     $file_count=0;
		      //向浏览器返回数据
		    while(!feof($fp) && $file_count<$file_size){
		         $file_con=fread($fp,$buffer);
		         $file_count+=$buffer;
		         echo $file_con;
		     }
	 	fclose($fp);
	}
		
		
	/**
	 * 这里是对前台ajax的点赞回应
	 */
	public function get_zan(){
		$data_1 = $this->input->get('num');
		var_dump($data_1);die;
		$data = array(
			'success'=> TRUE,
			'msg' => '错了',
		);
		echo json_encode($data);
	}
	
	
}
