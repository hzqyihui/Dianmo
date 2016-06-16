<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是二级页面发出动作，请求数据库
 * */
class Get_out extends CI_Controller{
	
	/*
	 * 这是书画的二级页面请求动作，进入三级页面
	 */
	public function calli_get(){
		$id = $this->uri->segment(4);
		$this->load->model('three/calli_get');
		$num = 1;
		$data['detail'] = $this->calli_get->calli_detail($id,$num);
		
		//对评论进行分页
		$this->load->library('pagination');
		$perpage = 2;
		$total_rows = $this->db->where('object_id',$id)->count_all_results('comments_calli');
		//echo $total_rows; die;
		$config['base_url'] = site_url('shuhua/get_out/calli_get').'/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 5;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(5);
		$this->db->limit($perpage,$offset);
		$this->load->model('comments/calli_comment');
		$data['comment'] = $this->calli_comment->get_comment($id);
		$data['id'] = $id;
		//var_dump($_SESSION['username']);die;
		$this->load->view('three/picture_thr', $data);
	}
	
	
	
	
	
	
}
