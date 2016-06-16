<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 这是对数据库取得音乐相关的数据
 * */
class Poem_get extends CI_Model{
	/*
	 * 这里二级页面发出id请求对数据库表进行操作。
	 * */
	public function poem_detail($id,$num){
		$this->db->select('name,writer,writer_id,poem,translation,appreciate,note,admire_num');
		$data = $this->db->where('id',$id)->get('poem')->result_array();
		if($num == 1){
				$data_2 = array(
		 		'admire_num' => $data[0]['admire_num']+$num,
			);
			$this->db->where('id',$id)->update('poem',$data_2);
			$data_4 = $this->db->select('all_admire_num')->where('id',$data[0]['writer_id'])->get('writer')->result_array();
			$data_5 = array(
		 		'all_admire_num' => $data_4[0]['all_admire_num']+$num,
			);
			$this->db->where('id',$data[0]['writer_id'])->update('writer',$data_5);	
		}
		return $data;
	}
	
	/**
	 * 这里是根据点赞表，利用简单排序得出20首诗词
	 */
	public function poem_list(){
		$this->db->select('id,name,writer,writer_id');
		$this->db->limit(20);
		$this->db->order_by('admire_num', 'DESC');
		$data = $this->db->get('poem')->result_array();
		return $data;
	}
	
	/**
	 * 这里是根据诗词表时间戳，利用简单排序得出6首诗词
	 */
	public function get_new_poem(){
		$this->db->select('id,name,pic_path,writer,poem,writer_id');
		$this->db->limit(6);
		$this->db->order_by('time', 'DESC');
		$data = $this->db->get('poem')->result_array();
		return $data;
	}

	/**
	 * 这里是根据作者表点赞总量，利用简单排序得出六位诗人
	 */
	public function poemget_writer(){
		$this->db->select('name,pic_path,id');
		$this->db->limit(6);
		$this->db->where('class','诗词鉴赏');
		$this->db->from('writer');
		$this->db->order_by('all_admire_num', 'DESC');
		$data = $this->db->get()->result_array();
		return $data;
	}
	
	/**
	 * 这里是根据作者表点赞总量，利用简单排序得出六位诗人
	 */
	public function poemget_writer_one(){
		$this->db->select('name,pic_path,id');
		$this->db->limit(1);
		$this->db->where('class','诗词鉴赏');
		$this->db->from('writer');
		$this->db->order_by('all_admire_num', 'DESC');
		$data = $this->db->get()->result_array();
		return $data;
	}
	
}
