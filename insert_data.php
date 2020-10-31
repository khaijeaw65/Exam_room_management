<?php
require_once 'config.php';
require_once 'phpspreadsheet\vendor\autoload.php';
require_once 'phpspreadsheet\vendor\phpoffice\phpspreadsheet\src\Bootstrap.php';
use phpspreadsheet\vendor\phpoffice\phpspreadsheet\src\PhpSpreadsheet\IOFactory;
use phpspreadsheet\vendor\phpoffice\phpspreadsheet\src\PhpSpreadsheet\Helper\Sample;

if (isset($_POST['building'],$_POST['roomNum'],$_POST['seatAmount'])){
	$building = $_POST['building'];
	$roomNum = $_POST['roomNum'];
	$seatAmount = $_POST['seatAmount'];
	
	$check = $db->query("select `Num` from `room` where `Num` = '$roomNum'");
	
	if($check == false){
		die('query error');
	}
	$checkRow = $check->num_rows;
	
	if($checkRow > 0){
		echo "<script>alert('เลขห้องสอบซ้ำกับในระบบ'); window.location.href=\"add_data.php\"</script>";
	}else{
		$query = $db->query("insert into `room` (`Num`,`Seat_amount`,`BuildingID`) value ('$roomNum','$seatAmount','$building')");
		
		if($query == false){
			echo 'query error';
		}else{
			echo '<script>alert("บันทึกข้อมูลสำเร็จ"); window.location.href="add_data.php"</script>';
		}
	}
}
if(0 < $_FILES["student_file"]['error'] && !isset($_POST['building']) && !isset($_POST['room']) && !isset($_POST['date']) && !isset($_POST['subject'])){
	echo 'error'. $_FILES['student_file']['error'] . '<br>';
}else{
	$folder = 'upload/';
	$fileTempPath = $_FILES["student_file"]["tmp_name"];
	$fileName = $_FILES["student_file"]["name"];
	$path = $folder . $fileName;
	
	$building = $_POST['building'];
	$room = $_POST['room'];
	$date = $_POST['date'];
	$subject = $_POST['subject'];
	
	
	if(file_exists($path)){
		echo '<script>alert("มีไฟล์นี้ในระบบ"); window.location.href="add_exam.php"</script>';
	}
	
	if(move_uploaded_file($fileTempPath,$path)){
		$fileType = pathinfo($path);
		if($fileType['extension'] == "csv"){
			$inputType = 'Csv';
			
			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputType);
			$reader->setReadDataOnly(true);
			$sheet = $reader->load($path);
			
			$sheetData = $sheet->getActiveSheet()->toArray(null, true,true,true);
			
			for($row = 2;$row <= count($sheetData); $row++){
				$xx = "'". implode("','", $sheetData[$row]) ."'";
				$query = $db->query("insert into exam (`date`,`building_id`,`room_id`,`subject`,`student_prefix`,`student_name`,`student_surname`,`student_id`,`student_faculty`,`student_branch`) value ('$date','$building','$room','$subject',$xx)");
				if($query == false){
					echo 'query error';
				}else{
					echo '<script>alert("บันทึกข้อมูลสำเร็จ"); window.location.href="add_exam.php"</script>';
				}
			}
		}else if ($fileType['extension'] == "xls"){
			$inputType = 'Xls';
			
			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputType);
			$reader->setReadDataOnly(true);
			$sheet = $reader->load($path);
			
			$sheetData = $sheet->getActiveSheet()->toArray(null, true,true,true);
			
			for($row = 2;$row <= count($sheetData); $row++){
				$xx = "'". implode("','", $sheetData[$row]) ."'";
				$query = $db->query("insert into exam (`date`,`building_id`,`room_id`,`subject`,`student_prefix`,`student_name`,`student_surname`,`student_id`,`student_faculty`,`student_branch`) value ('$date','$building','$room','$subject',$xx)");
				if($query == false){
					echo 'query error';
				}else{
					echo '<script>alert("บันทึกข้อมูลสำเร็จ"); window.location.href="add_exam.php"</script>';
				}
			}
		}else if($fileType['extension'] == "xlsx"){
			$inputType = 'Xlsx';
			
			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputType);
			$reader->setReadDataOnly(true);
			$sheet = $reader->load($path);
			
			$sheetData = $sheet->getActiveSheet()->toArray(null, true,true,true);
			
			for($row = 2;$row <= count($sheetData); $row++){
				$xx = "'". implode("','", $sheetData[$row]) ."'";
				$query = $db->query("insert into exam (`date`,`building_id`,`room_id`,`subject`,`student_prefix`,`student_name`,`student_surname`,`student_id`,`student_faculty`,`student_branch`) value ('$date','$building','$room','$subject',$xx)");
				if($query == false){
					echo 'query error';
				}else{
					echo '<script>alert("บันทึกข้อมูลสำเร็จ"); window.location.href="add_exam.php"</script>';
				}
			}
		}
	}
}




