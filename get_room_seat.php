<?php

require_once 'config.php';

header('Content-Type: application/json');

$id = $_POST['r_id'];

$query = $con->prepare("Select `num`,`seat_amount` from room where `ID` = $id");

$result = array();

if($query == false){
	die('query error');
}else{
	while ($row = $query->fetch()){
		array_push($result,$row);
	}
}
echo json_encode($result);