<?php
	include('islogin.php');		//加载 判断是否登录文件
	include('config.php');		//加载参数配置文件
	include('func.php');		  //加载公共函数文件
	
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
			<td><input type='text' name='data[title]' id='title' style='height:30px;width:350px;'  /></td>
		</tr>
		<tr>
			<td style='text-align:center;'>栏目：</td>
			<td>
				<select name='data[category]' id='category' style='height:30px;'>
					<option value=0>--请选择--</option>
					<option value='PHP'>PHP</option>
					<option value='JAVA'>JAVA</option>
					<option value='HTML'>HTML</option>
				</select>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>内容：</td>
			<td>
				<textarea name="data[content]" id='content' rows='8' cols='80'></textarea>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>标签：</td>
			<td>
				<input type='text' name='data[tag]' id='tag' style='height:30px;width:350px;'  />
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
