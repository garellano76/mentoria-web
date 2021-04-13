<?php

$dbname = "registro";
$dbuser = "registro-user";
$dbpassword = "user1";

try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $db = new PDO($dsn,$dbuser,$dbpassword);   
    echo "conexion correcta"; 
} catch (PDOException $e){
    echo $e->getmessage();
}

// Preparar consulta
$sql = "INSERT INTO  users 
            (full_name, email, user_name, password)
          VALUES
            (:full_name, :email, :user_name, :password)";

//statement            
$stmt = $db->prepare($sql);

$full_name = 'Juan Perez';
$email = 'juan.perez@segic.cl';
$user_name = 'juan.perez';
$password = 'juan123';

$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':user_name', $user_name);
$stmt->bindParam(':password', $password);

$stmt->execute();


