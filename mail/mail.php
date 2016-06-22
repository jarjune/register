<?php
	header("Content-type: text/html; charset=utf-8");

require("class.phpmailer.php");
$mail=new PHPMailer();
$mail->CharSet="UTF-8";//支持中文

$mail->SMTPDebug = 1;
$address="408100801@qq.com";//收件人邮箱
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

$mail->Subject="中文可以吗";//主题
$mail->Body="中文";//内容
if(!$mail->Send())
{
	echo "邮件发送失败, <p>";
	echo "错误原因：".$mail->ErrorInfo;
	exit();
}
echo "邮件发送OK";

echo '为了防止误操作，如要使用，请先去掉注释<br/>--FE';
?>