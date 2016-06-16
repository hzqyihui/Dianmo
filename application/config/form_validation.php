<?php
	$config = array(
		'log' => array(
			array(
				'field' => 'user_name',
				'label' => '用户名',
				'rules' => 'required|min_length[5]'
			),
			array(
				'field' => 'user_pwd',
				'label' => '密码',
				'rules' => 'required'
			),
		),
		
		'reg' => array(
			array(
				'field' => 'user_name',
				'label' => '用户名',
				'rules' => 'required|min_length[5]'
			),
			array(
				'field' => 'user_pwd_1',
				'label' => '密码',
				'rules' => 'required'
			),
			array(
				'field' => 'user_pwd_2',
				'label' => '确认密码',
				'rules' => 'required'
			),
			array(
				'field' => 'user_email',
				'label' => '邮箱',
				'rules' => 'required|min_length[8]'
			),
		),
	);	
