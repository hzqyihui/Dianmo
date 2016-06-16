<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得文章相关的数据
 * */
class Artical_get extends CI_Model{
	/*
	 * 这里是对查看陌上遗风数据库表进行操作。
	 * */
	public function artical_some_detail($class){
		$this->db->select('id,name,writer,writer_id');
		$data = $this->db->where('class', $class)->get('artical')->result_array();
		return $data;
	}
	
	
	
	/*
	 * 这里二级页面发出id请求对数据库表进行操作。
	 * */
	public function article_list(){
		$this->db->select('id,name,writer,writer_id');
		$this->db->limit(19);
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('artical')->result_array();
		return $data;
	}
	
	/*
	 * 这里二级页面发出id请求对数据库表进行操作。
	 * */
	public function artical_detail($id,$num){
		$this->db->select('name,writer,writer_id,artical,admire_num');
		$data = $this->db->where('id',$id)->get('artical')->result_array();
		if($num == 1){
				$data_2 = array(
		 		'admire_num' => $data[0]['admire_num']+$num,
			);
			$this->db->where('id',$id)->update('artical',$data_2);
			$data_4 = $this->db->select('all_admire_num')->where('id',$data[0]['writer_id'])->get('writer')->result_array();
			$data_5 = array(
		 		'all_admire_num' => $data_4[0]['all_admire_num']+$num,
			);
			$this->db->where('id',$data[0]['writer_id'])->update('writer',$data_5);	
		}
		return $data;
	}
	
	
	/**
	 * 这里是根据文章表时间戳，利用简单排序得出6首诗词
	 */
	public function get_new_artical(){
		$this->db->select('id,name,pic_path,writer,artical,writer_id');
		$this->db->limit(6);
		$this->db->order_by('time', 'DESC');
		$data = $this->db->get('artical')->result_array();
		return $data;
	}
	
	/**
	 * 这里是根据作者表点赞总量，利用简单排序得出六位诗人
	 */
	public function articalget_writer(){
		$this->db->select('name,pic_path,id');
		$this->db->limit(6);
		$this->db->where('class','陌上遗风');
		$this->db->from('writer');
		$this->db->order_by('all_admire_num', 'DESC');
		$data = $this->db->get()->result_array();
		return $data;
	}
	
	/**
	 * 这里是根据作者表点赞总量，利用简单排序得出六位诗人
	 */
	public function articalget_writer_one(){
		$this->db->select('name,pic_path,id');
		$this->db->limit(1);
		$this->db->where('class','陌上遗风');
		$this->db->from('writer');
		$this->db->order_by('all_admire_num', 'DESC');
		$data = $this->db->get()->result_array();
		return $data;
	}
	
	 
}
