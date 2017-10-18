<?php
	//处理注册流程
	include('config.php');		//加载参数配置文件
	include('func.php');		//加载公共函数文件
	
	if(empty($_POST)){			//判断必须从注册页面提交
		$msg = '请从注册页面提交';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
								//简单判断用户名、密码不能为空，密码确认密码必须一致
	if(trim($_POST['uname'])=='' || strlen($_POST['pwd'])<6 || $_POST['pwd']!=$_POST['rpwd']){
		$msg = '用户名或密码格式不正确';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
					//匹配手机号
	if(!preg_match( "/^((13[0-9])|(15[1-3,5-9])|(17[7])|(18[0-9]))\d{8}$/", trim($_POST['tel']) )){
		$msg = '手机号格式不正确';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
					//匹配邮箱格式
	if(!preg_match( "/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/", trim($_POST['email']) )){
		$msg = '邮箱格式不正确';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	if(isParamExists($user_dir,trim($_POST['uname']),'user')==true){		//判断用户名是否存在
		$msg = '该用户名已经存在，请重新输入';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
		
	if(file_exists($user_dir.'/'.trim($_POST['uname']).'.txt')){
		$msg = '存在和用户名相同的文件夹';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	$handle = fopen($user_dir.'/'.trim($_POST['uname']).'.txt', 'a');		//将注册信息写入文件
	$str = '';
	$str .= getID($user_dir)."\r\n";
	$str .= trim($_POST['uname'])."\r\n";
	$str .= md5($_POST['pwd'])."\r\n";
	$str .= trim($_POST['tel'])."\r\n";
	$str .= trim($_POST['email'])."\r\n";
	$str .= time();		//注册时间
	
	$result = fwrite($handle, $str);
	fclose($handle);
	
	if($result>0){
		$msg = '操作成功';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}else{
		unlink($user_dir.'/'.trim($_POST['uname']).'.txt');		//操作失败则删除文件
		
		$msg = '操作失败';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	
	
	
	
	
