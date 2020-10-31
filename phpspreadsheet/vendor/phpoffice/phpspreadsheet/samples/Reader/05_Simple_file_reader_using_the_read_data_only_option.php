<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use \phpoffice\phpspreadsheet\samples;

require __DIR__ . '/../Header.php';

$inputFileType = 'Csv';
$inputFileName = __DIR__ . '/sampleData/example1.xls';

$helper = new samples\;
$reader = IOFactory::createReader($inputFileType);
$helper->log('Turning Formatting off for Load');
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($inputFileName);

$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
var_dump($sheetData);
