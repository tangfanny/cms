<?php
	include('islogin.php');		//加载 判断是否登录文件
	include('config.php');		//加载参数配置文件
	include('func.php');		//加载公共函数文件
	
	$id = $_GET['id'];
	if(!$id){
		$msg = '参数错误';
		$jumpUrl = 'index.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	if(file_exists($article_dir.'/'.trim($id).'.txt')==false){
		$msg = '数据文件不存在';
		$jumpUrl = 'index.php';
		$waitSecond = 3;
		include('tips.php');
		exit;
	}
	
	$data = getOne($article_dir,$id);
?>
<?php 
	include('header.php');
	include('left.php');
?>
<style>
.input{font-size:14px;padding:10px;border:solid 1px #ddd; width:100%;line-height:10px;display:block; border-radius:3px; -webkit-appearance:none;}
</style>
<div data-options="region:'center',split:true" style="padding:5px;">
	<form method='POST' action='doaddarticle.php'  enctype="multipart/form-data">
	<table class="tablelist" >
		<tr>
			<td style='text-align:center;'>标题：</td>
			<td><?php echo $data['title'];?></td>
		</tr>
		<tr>
			<td style='text-align:center;'>栏目：</td>
			<td><?php echo $data['category'];?></td>
		</tr>
		<tr>
			<td style='text-align:center;'>内容：</td>
			<td>
				<?php echo $data['content'];?>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>标签：</td>
			<td>
				<?php echo $data['tags'];?>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>图片：</td>
			<td>
				<img src="<?php echo $upload_dir.'/'.$data['img']?>" width='500' height='500'>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>发布人：</td>
			<td>
				<?php echo $data['add_username'];?>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>发布时间：</td>
			<td>
				<?php echo date('Y-m-d H:i:s',$data['add_time']);?>
			</td>
		</tr>
		
	</table>
	
	</form>

</div>

<?php 
	include('foot.php');
?>
