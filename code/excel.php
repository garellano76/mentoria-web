<?php

require "util/db.php";
$db = connectDB();

$sql = "SELECT * FROM users";

//statement

$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Exportar a excel

$filename = "users_".date('Ymd') . ".xls";
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
exit;
