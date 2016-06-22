<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="zc.css">
<link rel="stylesheet" type="text/css" href="foundation-icons.css">
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
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
			<li><i>2</i><span>激活</span></li>
			<li class="active"><i>3</i><span>注册成功</span></li>
		</ul>
	</div>
	<div class="main-info">
		<div class="activation fi-mail">
		
		<?php
			header("Content-type: text/html; charset=utf-8");
			require_once('conn.class.php');
			if($_SERVER['REQUEST_METHOD']=="GET"){

				$email = htmlspecialchars($_GET['e']);
				$check = htmlspecialchars($_GET['info']);

				$d = new sql();

				$arr = array("localhost","root","");
				$d->sqlConnect($arr,"myweb");

				$query = "select ischeck,passwd from user where email='$email'";
				
				$res = $d->sqlQuery($query);

				if($res->fetchColumn(0)==$check){
					$num = $d->sqlExec("update user set isuse=1 where email='$email' and isuse=0");
					if($num==0){
						echo '您已激活。';
					}else if($num==1){
						echo '激活成功。';
					}
				}
			}else{
				header("Location:failed.html");
			}
		?>
		</div>
	</div>
</div>
</body>
</html>