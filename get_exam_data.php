<?php
require_once 'config.php';

$b_id = $_POST['b_id'];
$r_id = $_POST['r_id'];
$date = $_POST['date'];

$query = $con->prepare("SELECT
building.`Name` as b_name,
room.num,
exam.date,
exam.`subject`,
exam.student_prefix,
exam.student_name,
exam.student_surname,
exam.student_id,
exam.student_faculty,
exam.student_branch
FROM
exam
INNER JOIN building ON exam.building_id = building.ID
INNER JOIN room ON room.building_id = building.ID AND exam.room_id = room.ID where exam.date = '$date' and building.ID = '$b_id' and room.ID = '$r_id'");

$result = array();

if($query == false){
	echo json_encode(array("msg" => 'query error'));
}

if($query->num_rows < 0){
	json_encode(array("msg" => 'no record found'));
}else{
	while($row = $query->fetch()){
		array_push($result,$row);
	}
	echo json_encode($result);
}
