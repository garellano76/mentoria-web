<?php

require "util/db.php";
$db = connectDB();

$sql = "SELECT * FROM users";

//statement

$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Exportar a excel

//require 'vendor/autoload.php';
require '../../test/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'FULL_NAME');
$sheet->setCellValue('C1', 'EMAIL');
$sheet->setCellValue('D1', 'USER');

foreach($users as $key => $user) {
    $llave = $key + 2;
    $sheet->setCellValue('A'.$llave, $user['id']);
    $sheet->setCellValue('B'.$llave, $user['full_name']);
    $sheet->setCellValue('C'.$llave, $user['email']);
    $sheet->setCellValue('D'.$llave, $user['user_name']);
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="hola.xlsx"');
$writer->save('php://output');

//Exportar a excel

/*$filename = "users_".date('Ymd') . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename='$filename'");
$show_coloumn = false;
if(!empty($users)) {
    foreach($users as $user) {
    if(!$show_coloumn) {
        // display field/column names in first row
        echo implode("t", array_keys($user)) . "n";
        $show_coloumn = true;
    }
    echo implode("t", array_values($user)) . "n";
    }   
}
exit;*/