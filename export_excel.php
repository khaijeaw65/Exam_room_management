<?php
require_once 'config.php';
require_once 'phpspreadsheet\vendor\autoload.php';
require_once 'Spreadsheet.php';

use phpspreadsheet\vendor\phpoffice\phpspreadsheet\src\PhpSpreadsheet\Writer;

$b_id = $_POST['building'];
$r_id = $_POST['room'];
$date = $_POST['date'];
$file_type = $_POST['excel_type'];
$path = 'upload/';
$fileName = "ข้อมูลการใช้ห้องสอบ." . $file_type;

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
if ($file_type == "xls") {
	$excel_write = new PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
	$spreadsheet->setActiveSheetIndex(0);
	$active_sheet = $spreadsheet->getActiveSheet();

	$active_sheet->setCellValue('A1', 'อาคาร');
	$active_sheet->setCellValue('B1', 'ห้องสอบ');
	$active_sheet->setCellValue('C1', 'วันที่สอบ');
	$active_sheet->setCellValue('D1', 'วิชาที่สอบ');
	$active_sheet->setCellValue('E1', 'รหัสนักศึกษา');
	$active_sheet->setCellValue('F1', 'คำนำหน้าชื่อ');
	$active_sheet->setCellValue('G1', 'ชื่อ');
	$active_sheet->setCellValue('H1', 'นามสกุล');
	$active_sheet->setCellValue('I1', 'คณะ');
	$active_sheet->setCellValue('J1', 'สาขา');



	$query = $db->query("SELECT
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

	if ($query == false) {
		echo json_encode(array("msg" => 'query error'));
	}

	if ($query->num_rows > 0) {
		for ($index = 2; $row = $query->fetch_assoc(); $index++) {
			$active_sheet->setCellValue('A' . $index, $row['b_name']);
			$active_sheet->setCellValue('B' . $index, $row['num']);
			$active_sheet->setCellValue('C' . $index, $row['date']);
			$active_sheet->setCellValue('D' . $index, $row['subject']);
			$active_sheet->setCellValue('E' . $index, $row['student_id']);
			$active_sheet->setCellValue('F' . $index, $row['student_prefix']);
			$active_sheet->setCellValue('G' . $index, $row['student_name']);
			$active_sheet->setCellValue('H' . $index, $row['student_surname']);
			$active_sheet->setCellValue('I' . $index, $row['student_faculty']);
			$active_sheet->setCellValue('J' . $index, $row['student_branch']);
		}
	}
	header('Content-Type: application/text-csv');
	header('Content-Disposition: attachment;filename="' . $fileName);
	header('Cache-Control: max-age=0');
	$excel_write->save('php://output');
} else if ($file_type == "xlsx") {
	$excel_write = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
	$spreadsheet->setActiveSheetIndex(0);
	$active_sheet = $spreadsheet->getActiveSheet();

	$active_sheet->setCellValue('A1', 'อาคาร');
	$active_sheet->setCellValue('B1', 'ห้องสอบ');
	$active_sheet->setCellValue('C1', 'วันที่สอบ');
	$active_sheet->setCellValue('D1', 'วิชาที่สอบ');
	$active_sheet->setCellValue('E1', 'รหัสนักศึกษา');
	$active_sheet->setCellValue('F1', 'คำนำหน้าชื่อ');
	$active_sheet->setCellValue('G1', 'ชื่อ');
	$active_sheet->setCellValue('H1', 'นามสกุล');
	$active_sheet->setCellValue('I1', 'คณะ');
	$active_sheet->setCellValue('J1', 'สาขา');



	$query = $db->query("SELECT
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

	if ($query == false) {
		echo json_encode(array("msg" => 'query error'));
	}

	if ($query->num_rows > 0) {
		for ($index = 2; $row = $query->fetch_assoc(); $index++) {
			$active_sheet->setCellValue('A' . $index, $row['b_name']);
			$active_sheet->setCellValue('B' . $index, $row['num']);
			$active_sheet->setCellValue('C' . $index, $row['date']);
			$active_sheet->setCellValue('D' . $index, $row['subject']);
			$active_sheet->setCellValue('E' . $index, $row['student_id']);
			$active_sheet->setCellValue('F' . $index, $row['student_prefix']);
			$active_sheet->setCellValue('G' . $index, $row['student_name']);
			$active_sheet->setCellValue('H' . $index, $row['student_surname']);
			$active_sheet->setCellValue('I' . $index, $row['student_faculty']);
			$active_sheet->setCellValue('J' . $index, $row['student_branch']);
		}
	}
	header('Content-Type: application/text-csv');
	header('Content-Disposition: attachment;filename="' . $fileName);
	header('Cache-Control: max-age=0');
	$excel_write->save('php://output');
}
