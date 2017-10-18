<?php
	include('islogin.php');		//加载 判断是否登录文件
	include('config.php');		//加载参数配置文件
	include('func.php');		//加载公共函数文件
	
?>
<?php 
	include('header.php');
	include('left.php');

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
<style>
.input{font-size:14px;padding:10px;border:solid 1px #ddd; width:100%;line-height:10px;display:block; border-radius:3px; -webkit-appearance:none;}
</style>
<div data-options="region:'center',split:true" style="padding:5px;">
	<form method='POST' action='doedit.php'  enctype="multipart/form-data">
	<input type='hidden' name='id' value="<?php echo $data['id'];?>" />
	<table class="tablelist" >
		<tr>
			<td style='text-align:center;'>标题：</td>
			<td><input type='text' name='data[title]' id='title' style='height:30px;width:350px;' value="<?php echo $data['title'];?>"  /></td>
		</tr>
		<tr>
			<td style='text-align:center;'>栏目：</td>
			<td>
				<select name='data[category]' id='category' style='height:30px;'>
					<option value=0>--请选择--</option>
					<option value='PHP' <?php if($data['category']=='PHP'){echo 'selected';}?> >PHP</option>
					<option value='JAVA' <?php if($data['category']=='JAVA'){echo 'selected';}?> >JAVA</option>
					<option value='HTML' <?php if($data['category']=='HTML'){echo 'selected';}?> >HTML</option>
				</select>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>内容：</td>
			<td>
				<textarea name="data[content]" id='content' rows='8' cols='80'><?php echo $data['content'];?></textarea>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>标签：</td>
			<td>
				<input type='text' name='data[tag]' id='tag' style='height:30px;width:350px;' value="<?php echo $data['tags'];?>" />
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>原图片：</td>
			<td>
				<img src="<?php echo $upload_dir.'/'.$data['img']?>" width='500' height='500'>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>图片：</td>
			<td>
				<input name="myfile" type="file">
			</td>
		</tr>
		<tr>
			<td style='text-align:center;' colspan='2'>
				<input type='submit' name='sub' value='提交' id='sub' style='width:50px;height:20px;' >
			</td>
		</tr>
		
	</table>
	
	</form>

</div>
<script>
$(function(){
	$('#sub').click(function(){
		if($('#title').val()==''){
			alert('标题不能为空');
			return false;
		}
		if($('#category').val()==0){
			alert('请选择栏目');
			return false;
		}
		if($('#content').val()==''){
			alert('内容不能为空');
			return false;
		}
	})
});
</script>
<?php 
	include('foot.php');
?>
