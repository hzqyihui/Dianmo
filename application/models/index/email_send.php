<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_send extends CI_Model{
	/**
	  * 这是对注册页面提供的邮箱进行反馈
	  * */
	  public function email_out($email){
	  	$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.qq.com';
		$config['smtp_user'] = '1291636265@qq.com';//邮箱名,例abc123@163.com
		$config['smtp_pass'] = '199602226712';//邮箱密码
		$config['smtp_port'] = '465';
		$config['charset'] = 'utf-8';//字符集
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html'; //正文支持html格式
		
		$this->email->initialize($config);
		
		//$this->email->clear();
		$this->email->from('1291636265@qq.com', '古韵之家');
		$this->email->to($email);
		
		$this->email->subject('注册');//设置 email 主题
		
		$this->email->message('<font color=red>恭喜你，注册成功！</font>'); //设置 email 正文部分
		$bool = $this->email->send();
		//echo $this->email->print_debugger();//返回错误
		return $bool;
	  }
	  
	  
}