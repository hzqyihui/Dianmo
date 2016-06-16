<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * =====================================================================================
 *
 *        Filename:  poem_common.php
 *
 *     Description:  类库
 *
 *         Created:  2016-05-09 15:46:32
 *
 *          Author:  huazhiqiang
 *
 * =====================================================================================
 */

class Poem_common {


	private $_CI;

	public function __construct(){
		$this->_CI = &get_instance();
	}
	
	/**
	 * 这里是根据点赞表，利用简单排序得出12篇赋
	 */
	public function poem_class($class){
		$this->_CI->db->select('id,name,writer,writer_id');
		$this->_CI->db->limit(12);
		$this->_CI->db->order_by('admire_num', 'DESC');
		$data = $this->_CI->db->where('class', $class) -> get('poem')->result_array();
		return $data;
	}
}