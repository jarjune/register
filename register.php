<?php
	header("Content-type: text/html; charset=utf-8");
	
	require_once("mail/class.phpmailer.php");
	
	require_once('conn.class.php');


	if($_SERVER['REQUEST_METHOD']=="POST"){
		$username = htmlspecialchars($_POST['username']);
		$passwd = md5(htmlspecialchars($_POST['passwd']));
		$email = htmlspecialchars($_POST['email']);
		$ischeck = md5(strtotime(date('Y-d-m H:i:s')));

		$mail=new PHPMailer();
		$mail->CharSet="UTF-8";//支持中文

		$mail->SMTPDebug = 1;
		$address="408100801@qq.com";//收件人邮箱
		//---------------->防止误操作<--------------$address=$email;//收件人邮箱
		$mail->IsSMTP();//使用smtp方式发送
		$mail->SMTPAuth=true;
		$mail->Host="smtp.qq.com";//邮局域名
		$mail->SMTPAuth=true;//启用smtp验证
		$mail->SMTPSecure='ssl';
		$mail->Username="2225606030@qq.com";//邮局用户名
		$mail->Password="zxdtqhbplsyseaja";//邮局密码
		$mail->Port=465;//端口(不变)
		$mail->From="2225606030@qq.com";//邮件发送者的email地址
		$mail->FromName="FE";//发送者名字
		$mail->AddAddress("$address","zhinan");//收件人地址，收件人姓名
		//$mail->AddReplyTo("","");

		//$mail->AddAttachment("");//附件里填附件路径
		//$mail->AddAttachment("e:/zhongw.txt");
		$mail->IsHTML(true);//是否使用html格式，意思就是html的标签可以用

		$mail->Subject="激活jarjune账号";//主题
		$mail->Body="点击<a href=\"http://localhost/zc/judge.php?info=$ischeck&e=$email\" style=\"color:#19f;font-size:16px;\">这里</a>激活账号<br>如果不是本人操作请忽略此邮件！";//内容
		$res = $mail->Send();

		if($res){
			session_start();
			$_SESSION['email'] =$email;
		}

		$d = new sql();

		$arr = array("localhost","root","");
		$d->sqlConnect($arr,"myweb");

		$query = "insert into user
		(username,email,passwd,ischeck)
		select '$username','$email','$passwd','$ischeck'
		from dual where not exists(select email from user where email='$email')";
		
		$row = $d->sqlExec($query);

		echo json_encode(array("judge"=>$res,"row"=>$row));
	}else{
		header("Location:failed.html");
	}

