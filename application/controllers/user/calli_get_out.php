<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Calli_get_out extends CI_Controller{
	
	/*
	 * 这是用户个人主页点击事件进入三级页面
	 */
	public function calli_get(){
		$id = $this->uri->segment(4);
		
		$data = $this->db->select('bool_change')->where('id',$id)->get('upload_calligraphy')->result_array();
		$data_2 = $this->db->select('id')->where('upload_id',$id)->get('calligraphy')->result_array();
		//var_dump($data[0]['bool_change']);die;
		//如果这首音乐通过了审核
		if($data[0]['bool_change'] == 1){
			$this->load->model('three/calli_get');
			
			$num = 1;
			$data['detail'] = $this->calli_get->calli_detail($data_2[0]['id'],$num);
			
			//对评论进行分页
			$this->load->library('pagination');
			$perpage = 2;
			
			$total_rows = $this->db->where('object_id',$data_2[0]['id'])->count_all_results('comments_calli');
			//echo $total_rows; die;
			$config['base_url'] = site_url('user/calli_get_out/calli_get').'/'.$data_2[0]['id'];
			$config['total_rows'] = $total_rows;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 5;
			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();
			
			$offset = $this->uri->segment(5);
			$this->db->limit($perpage,$offset);
			$this->load->model('comments/calli_comment');
			$data['comment'] = $this->calli_comment->get_comment($data_2[0]['id']);
			$data['id'] = $data_2[0]['id'];
			//var_dump($data);die;
			$this->load->view('three/picture_thr', $data);
		}else{
			$this->load->model('user/calli_get');
			
			$data['detail'] = $this->calli_get->calli_detail($id);
			$data['links'] = NULL;
			$data['comment'] =NULL;
			$data['id'] = NULL;
			$this->load->view('three/upload_picture_thr', $data);
		}
		
	}
	
	/**
	 * 这是用户个人主页点击事件删除
	 */
	public function calli_upload_del(){
		$id = $this->uri->segment(4);
		$this->load->model('user/calli_upload');
		$this->calli_upload->calli_upload_del($id);
	}
	
	
	
	
}
