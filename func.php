<?php
	//公共函数文件

	//判断用户名、手机号、邮箱是否已经存在
function isParamExists($dir,$parameter,$type){
	$files = scandir($dir);
	$is_exists = false;		//默认不存在
	foreach($files as $k=>$v){
		if($v=='.' || $v=='..'){
			continue;
		}
		$content_arr = file($dir.'/'.$v);
		
		if($type=='user'){
			$exist_value = str_replace(PHP_EOL,"",$content_arr[1]);		//用户名
		}else if($type=='phone'){
			$exist_value = str_replace(PHP_EOL,"",$content_arr[3]);		//取手机号
		}else{
			$exist_value = str_replace(PHP_EOL,"",$content_arr[4]);		//去除换行符，取邮箱
		}
		if($exist_value==$parameter){
			$is_exists = true;			//判断手机号是否存在,存在返回true
			break;
		}
	}

	return $is_exists;
}


	//获取用户ID值
function getID($dir){
	$files = scandir($dir);
	$is_exists = false;		//默认不存在
	$id= array();
	foreach($files as $k=>$v){
		if($v=='.' || $v=='..'){
			continue;
		}
		$content_arr = file($dir.'/'.$v);
		$id[] = str_replace(PHP_EOL,"",$content_arr[0]); //取的id
	}
	sort($id);
	
	$max_id = empty($id) ? 1:max($id)+1;
	
	return $max_id;
}

			//获取文章ID
function getArticleID($dir){
	$files = scandir($dir);
	$is_exists = false;		//默认不存在
	$id= array();
	foreach($files as $k=>$v){
		if($v=='.' || $v=='..'){
			continue;
		}
		$content_arr = pathinfo($dir.'/'.$v);
		$id[] = $content_arr['filename']; //取的id
	}
	sort($id);
	
	$max_id = empty($id) ? 1:max($id)+1;
	
	return $max_id;
}


	
	//获取用户信息
function getUserInfo($dir,$user){
	if(!file_exists($dir.'/'.$user.'.txt')){
		return false;
		exit;
	}
	$content_arr = file($dir.'/'.$user.'.txt');
	foreach($content_arr as $k=>$v){
		$data[] = str_replace(PHP_EOL,"",$v);
	}
	
	return $data;
}

	///获取所有文章列表
function getList($dir){
	if(!$dir){
		return false;
	}
	$data = array();
	
	$files = scandir($dir);
	foreach($files as $k=>$val){
		if($val=='.' || $val=='..'){
			continue;
		}
		$content_arr = file($dir.'/'.$val);
		
		$info = array();
		$info['id'] = str_replace(PHP_EOL,"",$content_arr[0]);		//id
		$info['title'] = str_replace(PHP_EOL,"",$content_arr[1]);		//标题
		$info['category'] = str_replace(PHP_EOL,"",$content_arr[2]);		//栏目
		$info['content'] = $content_arr[3];			//内容
		$info['tags'] = str_replace(PHP_EOL,"",$content_arr[4]);	//标签
		$info['img'] = str_replace(PHP_EOL,"",$content_arr[5]);		//图片名称
		$info['add_username'] = str_replace(PHP_EOL,"",$content_arr[6]);		//添加人
		$info['add_time'] = str_replace(PHP_EOL,"",$content_arr[7]);		//添加时间
		
		$data[] = $info;
	}
	
	return $data;
}
		//获取单条文章数据
function getOne($dir,$id){
	if(!file_exists($dir.'/'.$id.'.txt')){
		return false;
	}
	$data = file($dir.'/'.$id.'.txt');		//读取文本数据
	$info = array();
		
	$info['id'] = str_replace(PHP_EOL,'',$data[0]);		//id
	$info['title'] = str_replace(PHP_EOL,"",$data[1]);		//标题
	$info['category'] = str_replace(PHP_EOL,"",$data[2]);		//栏目
	$info['content'] = str_replace(PHP_EOL,"",$data[3]);			//内容
	$info['tags'] = str_replace(PHP_EOL,"",$data[4]);	//标签
	$info['img'] = str_replace(PHP_EOL,"",$data[5]);		//图片名称
	$info['add_username'] = str_replace(PHP_EOL,"",$data[6]);		//添加人
	$info['add_time'] = str_replace(PHP_EOL,"",$data[7]);		//添加时间
	
	return $info;
}


?>