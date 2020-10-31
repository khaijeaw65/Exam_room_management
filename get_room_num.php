<?php

require_once 'config.php';

header('Content-Type: application/json');

$id = $_POST['b_id'];

$query = $db->query("Select `ID`,`num` from room where building_id = $id ORDER BY `Num` ASC ");

$result = array();

if($query == false){
	die('query error');
}else{
	while ($row = $query->fetch_assoc()){
		array_push($result,$row);
	}
}
echo json_encode($result);
