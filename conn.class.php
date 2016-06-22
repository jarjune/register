<?php
	/**
	* 连接数据库
	*/

	header("Content-type: text/html; charset=utf-8");
	class sql{
		public $serverName = "localhost";
		public $userName = "root";
		public $password = "";
		public $con;
		/*$info为一个数组和一个数据库名
			参数一 服务器地址
			参数二 数据库用户名
			参数三 数据库密码
		*/
		function sqlConnect($sqlInfo,$dbName){
				$serverName = $sqlInfo[0];
				$userName = $sqlInfo[1];
				$password = $sqlInfo[2];
			try{
				$this->con = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password);
				$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->con->exec("set character set utf8");
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			// return $this->con;
		}

		function sqlClose(){
			$this->con = null;
		}
/*
	query用于select
	exec用于insert update delete
*/
		function sqlExec($query){

			return $this->con->exec($query);
		}

		function sqlQuery($query){
			return $this->con->query($query);
		}
	}
	