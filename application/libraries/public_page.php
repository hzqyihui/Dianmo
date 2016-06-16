<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_page extends CI_Controller{
	private $_CI;

	public function __construct(){
		$this->_CI = &get_instance();
	}
	
	/**
	 * 这里是个人页面音乐的分页
	 */
	public function music_page($perpage,$name){
		$this->_CI->load->library('pagination');
		
		$total_num = $this->_CI->db->where('user_name',$name)->count_all_results('upload_music');
		$config['base_url'] = site_url('banner/to_personal').'/'.$name;
		$config['total_rows'] = $total_num;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
		$config['first_url'] = $this->_CI->uri->segment(4);
		$this->_CI->pagination->initialize($config);
		$data = $this->_CI->pagination->create_links();
		
		
		return $data;
	}
	
	
	
	/**
	 * 这里是个人页面书画的分页
	 */
	public function calli_page($perpage,$name){
		$this->_CI->load->library('pagination');
		
		$total_num = $this->_CI->db->where('user_name',$name)->count_all_results('upload_calligraphy');
		$config['base_url'] = site_url('banner/to_personal').'/'.$name.'/'.$this->_CI->uri->segment(4);
		$config['total_rows'] = $total_num;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 5;
		$this->_CI->pagination->initialize($config);
		$data = $this->_CI->pagination->create_links();
		
		return $data;
	}

	/**
	 * 这里是个人页面书画的分页
	 */
	public function poem_page($perpage,$name){
		$this->_CI->load->library('pagination');
		
		$total_num = $this->_CI->db->where('writer',$name)->count_all_results('poem');
		$config['base_url'] = site_url('banner/to_poem_writer_personal').'/'.$name.'/'.$this->_CI->uri->segment(4);
		$config['total_rows'] = $total_num;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 5;
		$this->_CI->pagination->initialize($config);
		$data = $this->_CI->pagination->create_links();
		
		return $data;
	}
	
	/**
	 * 这里是个人页面书画的分页
	 */
	public function artical_page($perpage,$name){
		$this->_CI->load->library('pagination');
		
		$total_num = $this->_CI->db->where('writer',$name)->count_all_results('artical');
		$config['base_url'] = site_url('banner/to_artical_writer_personal').'/'.$name.'/'.$this->_CI->uri->segment(4);
		$config['total_rows'] = $total_num;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 5;
		$this->_CI->pagination->initialize($config);
		$data = $this->_CI->pagination->create_links();
		
		return $data;
	}
	
}