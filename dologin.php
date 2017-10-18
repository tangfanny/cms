<?php
	//处理登录文件
	session_start();
	include('config.php');		//加载参数配置文件
	include('func.php');		//加载公共函数文件
	
	$uname = trim($_POST['uname']);
	$pwd = md5($_POST['pwd']);
	
	if($uname=='' || $pwd==''){
		$msg = '用户名密码不能为空';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	$data = getUserInfo($user_dir,$uname);		//获取用户信息
	if(!$data){
		$msg = '未找到相关用户，登录失败';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	if($pwd!=$data[2]){
		$msg = '密码错误';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	$_SESSION['uid'] = $data[0];
	$_SESSION['username'] = $data[1];
//	$_SESSION['tel'] = $data[3];
//	$_SESSION['email'] = $data[4];			//后面两项可根据实际情况选择是否放入session里

	$msg = '操作成功';
	$jumpUrl = 'index.php';
	$waitSecond = 3;
	include('tips.php');
	exit;
	
	

