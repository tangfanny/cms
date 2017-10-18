<?php
	//判断用户是否登录
	session_start();
	session_destroy();
	
	if(isset($_SESSION['uid'])){
		$msg = '操作成功';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}else{
		$msg = '操作失败';
		$jumpUrl = 'index.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}

?>