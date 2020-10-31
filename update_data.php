<?php

require_once 'config.php';

if(isset($_POST['building']) && isset($_POST['room_num']) && isset($_POST['new_room_num']) && isset($_POST['new_seat_amount'])){
	$b_id = $_POST['building'];
	$r_id = $_POST['room_num'];
	$room_num = $_POST['new_room_num'];
	$seat_amount = $_POST['new_seat_amount'];
	
	$query = $db->query("update room set `Num` = '$room_num', `Seat_amount` = '$seat_amount' where `ID` = '$r_id'");
	
	if($query == false){
		die('query error');
	}else{
		echo "<script>alert('บันทึกข้อมูลเรียบร้อย'); window.location.href='edit_data.php'</script>";
	}
}



