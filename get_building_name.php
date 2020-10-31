<?php

require_once('config.php');

$query = $con->prepare("Select `ID`,`Name` as b_name from `building`");

$result = array();

if($query == false){
	die ('query error');
}else{
	while ($row = $query->fetch()){
		array_push($result,$row);
	}
}

echo json_encode($result);




