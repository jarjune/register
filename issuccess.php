<?php
	header("Content-type: text/html; charset=utf-8");
	require_once('conn.class.php');

		session_start();
		if(isset($_SESSION['email'])){
			$email = $_SESSION['email'];
			$d = new sql();

			$arr = array("localhost","root","");
			$d->sqlConnect($arr,"myweb");

			$query = "select isuse from user where email='$email'";
			
			$res = $d->sqlQuery($query)->fetchColumn();
			echo $res;
		}else{
			header("Location:failed.html");
		}
?>