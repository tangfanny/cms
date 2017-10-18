<?php
	include('islogin.php');		//加载 判断是否登录文件
	include('config.php');		//加载参数配置文件
	include('func.php');		//加载公共函数文件

	
	$conn = mysqli_connect($server_host, $server_name, $server_pwd);	//连接数据库
	if(!$conn) die('数据库连接失败');
	mysqli_query($conn, 'use test;');
	mysqli_query($conn, 'set names utf8;');
	$result = mysqli_query($conn, 'select * from news;');
	
	
?>
<?php 
	include('header.php');
	include('left.php');
?>

<div data-options="region:'center',split:true" style="padding:5px;">
	<form method='POST' action='delall.php' id='delform'>
	<div class="cz">
		<!--<a href="javascript:void(0)" class="easyui-linkbutton"  iconCls="icon-edit" >编辑</a>-->
		<a href="add_article.php" class="easyui-linkbutton" iconCls='icon-add'>增加</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls='icon-remove' id='delall'>删除</a>
	</div>
	<table class="tablelist">

		<tr bgcolor="#95b8e7">
			<th><input name="" type="checkbox" value="" onchange="checkAll(this)" ></th>
			<th>编号</th>
			<th>标题</th>
			<th>分类</th>
			<th>发布人/发布时间</th>
			<th>操作</th>
		</tr>
		<?php while($val = mysqli_fetch_array($result)){ 
			?>
		<tr>
			<td><input name="ids[]" type="checkbox" value="<?php echo $val['n_id'];?>"></td>
			<td><?php echo $val['n_id'];?></td>
			<td><?php echo $val['title'];?></td>
			<td><?php echo $val['type'];?></td>
			<td><?php echo $val['u_id'];?><br><?php echo $val['time'];?></td>
			<td><a href="info.php?id=<?php echo $val['n_id'];?>" class="tablelink">查看</a>&nbsp;<a href="edit.php?id=<?php echo $val['n_id'];?>" class="tablelink">编辑</a>&nbsp;<a href="del.php?id=<?php echo $val['n_id'];?>" class="tablelink" onclick="return confirm('确定删除吗?');"> 删除</a></td>
		</tr>
		<?php  } ?>
		

	</table>
	</form>

</div>

<script>
$(function(){
	$('#delall').click(function(){
		if(confirm('确定删除吗？')){
			$('#delform').submit();
		}else{
			return false;
		}
	})
});

function checkAll(o){
   $('input[name*="ids"]').attr('checked',o.checked);
}
</script>
<?php 
	include('foot.php');
?>
