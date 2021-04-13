<?php

$dbname = "registro44444";
$dbuser = "registro-user";
$dbpassword = "user1";

try {
    $dsn = "mysql;host=localhost;dbname=$dbname";
    $db = new PDO($dsn,$dbuser,$dbpassword);   
    echo "conexion correcta"; 
} catch (PDOException $e){
    echo $e->getmessage();
}


