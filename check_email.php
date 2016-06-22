<?php
	header("Content-type: text/html; charset=utf-8");

	require_once('conn.class.php');

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$email = htmlspecialchars($_POST['email']);

		$d = new sql();

		$arr = array("localhost","root","");
		$d->sqlConnect($arr,"myweb");

		$query = "select id from user where email='$email'";

		// echo $query;
		echo $d->sqlQuery($query)->rowCount();
	}else{
		header("Location:failed.html");
	}
?>