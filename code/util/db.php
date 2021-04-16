<?php

function connetDB()
    {
    $dbname = "registro";
    $dbuser = "registro-user";
    $dbpassword = "user1";

    try {
        $dsn = "mysql:host=localhost;dbname=$dbname";
        return $db = new PDO($dsn,$dbuser,$dbpassword);           
    } catch (PDOException $e){
        echo $e->getmessage();
    }
{