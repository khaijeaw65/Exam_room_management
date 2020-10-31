<?php
	$host="127.0.0.1";
	$user="root";
	$pwd="123456";
	$dbname="management";
	try {
	   // กรณีมี port
	  // $con = new PDO("mysql:host={$host};dbname={$dbname};port={$port}", $user, $pwd);  
		$con = new PDO("mysql:host={$host};dbname={$dbname};", $user, $pwd);  
		$con->exec("set names utf8");
	}
	// show error
	catch(PDOException $exception){
		die("Connection error: " . $exception->getMessage());
	}
?>