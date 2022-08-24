<?php

$n = isset($_GET['n']) ? $_GET['n'] : '泥豪';

require './../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
$sheet->setCellValue('B2', $n);

$writer = new Xlsx($spreadsheet);
$writer->save('hello_world.xlsx');

echo 'OK';
