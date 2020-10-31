<?php
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
	$name = $_POST['user'];
	$password = $_POST['pass'];
	
	if (empty($name))
		die("undefined username");
	if (empty($password))
		die("undefined password");
}

if($db->connect_error) {
	die('Connection failed : ' . $db->connect_error);
}
    
$result = $db->query("Select `Username`,`Password` from `user` where `Username` = '$name' and `Password` = '$password' LIMIT 1");
    
if ($result == false){
	die('query error');
}

if($result->num_rows == 1){
	$row = $result->fetch_assoc();
	$_SESSION['id'] = $row['Username'];
	echo "<script>window.location.href='index.php'</script>";
}else{
	echo "<script>alert('Wrong username or password'); window.location.href='login.php'</script>";
}

    
    