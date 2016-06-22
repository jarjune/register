<?php
	header("Content-type: text/html; charset=utf-8");

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		session_start();

		if (md5(strtolower($_POST['checkCode'])) == $_SESSION['checkCode']) {
			echo true;
		}else{
			echo false;
		}
		$_SESSION['checkCode'] = null;
	}else{
		header("Location:failed.html");
	}
?>