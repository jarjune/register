<?php

	$checkCode="";
	$arr=array('1','2','3','4','5','6','7','8','9','0','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m','Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M');

	for($i=0;$i<4;$i++){

		$checkCode.=$arr[rand(0,61)];
	}

	session_start();
	$_SESSION['checkCode'] =md5(strtolower($checkCode));
	
	$image=imagecreatetruecolor(170,40);
	$color=imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
	
	$color1=imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));

	imagefill($image,0,0,$color1);

	for($i=0;$i<12;$i++){
		imageline($image,rand(0,100),rand(0,30),rand(0,100),rand(0,30),imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255)));
	}

	imagettftext($image,rand(12,15),rand(15,-15),rand(10,60),rand(18,23),imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255)),'calibriz.ttf',$checkCode);
	
	
	header("content-type:image/png");
	imagepng($image);

	imagedestroy($image);

?>