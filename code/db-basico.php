<?php

$dbname = "registro";
$dbuser = "registro-user";
$dbpassword = "user1";

$dsn = "mysql;host=localhost;dbname=$dbname";
$db = new PDO($dsn,$dbuser,$dbpassword);
