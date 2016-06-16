<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是二级页面发出动作，请求数据库
 * */
class Get_out extends CI_Controller{
	
	/*
	 * 这是书画的二级页面请求动作，进入三级页面
	 * */
	
	public function artical_get(){
		$id = $this->uri->segment(4);
		$this->load->model('three/artical_get');
		$num = 1;
		$data['artical_detail'] = $this->artical_get->artical_detail($id,$num);
		
		//对评论进行分页
		$this->load->library('pagination');
		$perpage = 1;
		
		$total_rows = $this->db->where('object_id',$id)->count_all_results('comments_artical');
		//echo $total_rows; die;
		$config['base_url'] = site_url('artical/get_out/artical_get').'/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 5;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(5);
		$this->db->limit($perpage,$offset);
		$this->load->model('comments/artical_comment');
		$data['comment'] = $this->artical_comment->get_comment($id);
		$data['id'] = $id;
		//var_dump($data);die;
		
		$this->load->view('three/artical_three', $data);
	}
	
	
}