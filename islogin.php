<?php
	//判断用户是否登录
	session_start();
	if(!isset($_SESSION['uid']) && $_SESSION['uid']==''){
		$msg = '您还没有登录';
		$jumpUrl = 'login.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}

?>