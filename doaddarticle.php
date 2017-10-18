<?php
	//处理登录文件
	include('islogin.php');		//加载 判断是否登录文件
	include('config.php');		//加载参数配置文件
	include('func.php');		//加载公共函数文件
	
	$data = $_POST['data'];
	
	if(trim($data['title'])=='' || $data['category']=='' || trim($data['content'])=='' ){
		$msg = '请填写必填项';
		$jumpUrl = 'index.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
//	var_dump($data);exit;
	//处理文件上传   start
	$allowtype = array("gif", "png","jpg");   //设置充许上传的类型为gif, png, jpg	
	$path = $upload_dir;

	/* 判断文件是否可以成功上传到服务器，$_FILES['myfile']['error']值为0表示上传成功 ，其它值则出错*/
	if($_FILES['myfile']['error'] > 0) {  	
		$msg='';
		switch ($_FILES['myfile']['error']) {
			case 1:  $msg = '上传文件大小超出了PHP配置文件中的约定值：upload_max_filesize';break;
			case 2:  $msg = '上传文件大小超出了表单中的约定值：MAX_FILE_SIZE';break;
			case 3:  $msg = '文件只被部分上载';break;
			case 4:  $msg = '没有上传任何文件';break;
			default:  die('未知错误');
		}
		$jumpUrl = 'add_article.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	/* 判断上传的文件是否为充许的文件类型 */
	$temp_arr = explode(".",$_FILES['myfile']['name']);
	$hz = array_pop($temp_arr);
	if(!in_array($hz, $allowtype)) {
		$msg = "这个后缀是<b>".$hz."</b>, 不是允许的文件类型!";
		$jumpUrl = 'add_article.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
													//重命名文件
	$filename = date("YmdHis").mt_rand(100, 999).".".$hz;

	/* 判断是否为上传文件 */
	if (is_uploaded_file($_FILES['myfile']['tmp_name'])) { 			//判断是否是上传文件
 	    if(!move_uploaded_file($_FILES['myfile']["tmp_name"], $path.'/'.$filename)){//从临时目录移动文件到指定目录
			$msg = "文件未移动到指定目录!";
			$jumpUrl = 'add_article.php';
			$waitSecond = 3;
			include('tips.php');
			exit;
		}
 	}else{
		$msg = "上传文件{$_FILES['myfile']['name']}不是一个合法上传文件!";
		$jumpUrl = 'add_article.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	//处理文件上传   end
	
	$id = getArticleID($article_dir);		//获取id
	
	$handle = fopen($article_dir.'/'.$id.'.txt','a');
	
	$str = '';
	$str .= $id ."\r\n";
	$str .= trim($data['title']) ."\r\n";
	$str .= trim($data['category']) ."\r\n";
	$str .= $data['content'] ."\r\n";
	$str .= trim($data['tag'])."\r\n";
	$str .= $filename ."\r\n";
	$str .= $_SESSION['username'] ."\r\n";
	$str .= time() ."\r\n";
	
	$result = fwrite($handle, $str);
	fclose($handle);
	
	if($result>0){
		$msg = '操作成功';
		$jumpUrl = 'index.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}else{
		unlink($article_dir.'/'.$id.'.txt');		//操作失败则删除文件
		
		$msg = '操作失败';
		$jumpUrl = 'index.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}

