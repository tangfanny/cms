<?php
	include('islogin.php');		//加载 判断是否登录文件
	include('config.php');		//加载参数配置文件
	include('func.php');		//加载公共函数文件
	
	$id = $_POST['ids'];
	if(!$id){
		$msg = '参数错误';
		$jumpUrl = 'index.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}

	foreach($id as $v){
	
		if(file_exists($article_dir.'/'.trim($v).'.txt')==false){
			$msg = '数据文件不存在';
			$jumpUrl = 'index.php';
			$waitSecond = 3;
			include('tips.php');
			exit;
		}
	}
	foreach($id as $v){
		unlink($article_dir.'/'.trim($v).'.txt');
	}
	
		
	$msg = '操作成功';
	$jumpUrl = 'index.php';
	$waitSecond = 3;
	include('tips.php');
	exit;
	
	
	
?>
