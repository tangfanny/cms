<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录界面</title>
<script src="js/jquery.js"></script>
</head>
<style>
	*{ margin:0; padding:0}
	body{ background:url(images/timg.jpg) 50% 0}
	div{width:370px; margin-left:500px; margin-top:150px; background-color:#FFF; border:1px #CCCCCC solid; border-radius:8px;text-align:center}
	#switch_bottom{position: absolute; width: 70px; left:70px; top:49px; border-bottom:2px solid #848484;}
	#switch_bottom1{position: absolute; width: 70px; left:70px; top:49px; border-bottom:2px solid #848484;}
	span{ display:block; width:370px; height:50px; line-height:50px;text-align:center; border-bottom:#CCC 1px solid}
	span a{ text-decoration:none; color:#000}
	span a:hover{ text-decoration:underline; font-weight:bold}
	table{ width:370px; text-align:center; padding:20px 0}
	table tr{ height:50px; line-height:50px; width:300px;}
	input{ height:25px; width:222px;}
	.submit{ width:100px; height:30px; background:#2795DC; border-radius:5px; color:#FFF;}
	table tr td div{width:300px; height:35px; line-height:30px; margin:0 0 0 35px; border-radius:0; font-size:14px; font-weight:bold}
	table tr td a{ color:#CCCCCC; font-size:9px; position:relative; left:40px;}
	.reg{ display:none;}
</style>
<body>
<div>
	<form class="log" action="dologin.php" method="post">
        <span><a  href="#" id="login">快速登录</a>　　　　　　<a href="#" id="register">快速注册</a></span>
        <div class="switch_bottom" id="switch_bottom"></div>
        <table>
        <tr><td>帐号：<input type="text" name='uname' class="uname"><br></td></tr>
        <tr><td>密码：<input type="password" name='pwd' class="pwd"><br></td></tr>
        <tr><td><input id='sb1' class="submit" type="submit" value="登录"></td></tr>
        </table>
    </form>
    <form class="reg" action="register.php" method="post">
    	<span><a href="#" id="login1">快速登录</a>　　　　　　<a href="#" id="register1">快速注册</a></span>
        <div class="switch_bottom" id="switch_bottom1"></div>
        <table>
        	<tr><td><div>快速注册请注意格式</div></td></tr>
            <tr><td>　用户名：<input type="text" name='uname' id="uname"></td></tr>
            <tr><td>　　密码：<input type="password" name='pwd' id="pwd"></td></tr>
            <tr><td>确认密码：<input type="password" name='rpwd' id='rpwd'></td></tr> 
            <tr><td>　手机号：<input type="text" name='tel' id='tel'></td></tr>
            <tr><td>　　邮箱：<input type="text" name='email' id='email'></td></tr>
            <tr><td><input type="submit" value="同意并注册" class="submit" id='sub2'><a href="#">注册协议</a></td></tr>
        </table>
    </form>
</div>
<script>
$(function(){
	$('#register').click(function(){
		$('form:eq(0)').css('display','none');
		$('form:eq(1)').css('display','block');
		$('#switch_bottom1,#switch_bottom').animate({left:'230px',width:'70px'})
		})	
	$('#login1').click(function(){
		$('form:eq(0)').css('display','block');
		$('form:eq(1)').css('display','none');
		$('#switch_bottom,#switch_bottom1').animate({left:'70px',width:'70px'});
		})
	$('#sb1').click(function(){
		if($('.uname').val()==''){
			alert('用户名不能为空！');
			return false;
		}
		if($('.pwd').val()==''){
			alert('密码不能为空！');
			return false;
		}
	})
	
	$('#sub2').click(function(){
		var uname = $('#uname').val();
		var pwd = $('#pwd').val();
		var rpwd = $('#rpwd').val();
		var tel = $('#tel').val();
		var email = $('#email').val();
		if(uname==''){
			alert('请填写用户名');
			return false;
		}
		if(pwd.length<6){
			alert('请输入至少6位的密码');
			return false;
		}
		if(pwd!=rpwd){
			alert('两次密码输入不一致');
			return false;
		}
		
		var pattern=/^((13[0-9])|(15[1-3,5-9])|(17[7])|(18[0-9]))\d{8}$/;		//正则匹配手机号
		if(!pattern.test(tel)){
			alert('手机号格式不正确');
			return false;
		}

		var email_pattern= /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
									//正则匹配邮箱
		if(!email_pattern.test(email)){
			alert('邮箱格式不正确');
			return false;
		}
	});
	
})

</script>
</body>
</html>
