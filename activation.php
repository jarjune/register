<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="zc.css">
<link rel="stylesheet" type="text/css" href="foundation-icons.css">
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	var num = 0;
	window.setInterval(function(){
		$.ajax({
			type : 'post',
			url : 'http://localhost/zc/issuccess.php',
			dataType : 'text',
			success : function(res){
				if(res==1){
					// alert('success');
					window.location.href = 'http://localhost/zc/success.html';
				}else{
					// alert('false');
					//window.location.href = 'http://localhost/zc/failed.html';
				}
			}
		});
	},3000);
});
</script>
<title></title>
</head>
<body>
<div class="main">
	<div class="main-top">
		用户注册
	</div>
	<div class="main-guide">
		<ul>
			<li><i>1</i><span>填写基本信息</span></li>
			<li class="active"><i>2</i><span>激活</span></li>
			<li><i>3</i><span>注册成功</span></li>
		</ul>
	</div>
	<div class="main-info">
		<div class="activation fi-mail">
		<?php
			session_start();
			if(isset($_SESSION['email']))
			echo '请登录'.$_SESSION['email'].'查看邮件并激活。';
		?>
		</div>
	</div>
</div>
</body>
</html>