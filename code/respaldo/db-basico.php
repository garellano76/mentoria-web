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

// Preparar consulta INSERT
/*
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
*/

// Preparar consulta DELETE
/*$id = 3;
$stmt = $db->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindparam(':id', $id);

$stmt->execute();
*/

// Preparar consulta INSERT Masivo
$users = [
  [
      'name'=>'miguel', 
      'email'=>'miguel.p@usach', 
      'username'=>'miguel', 
      'password'=>'miguel123'
  ],
  [
      'name'=>'andrea', 
      'email'=>'andrea.a@usach', 
      'username'=>'andrea', 
      'password'=>'andrea123'
  ]
];


$sql ="INSERT INTO users
(full_name, email, user_name, password)
VALUES
(:full_name, :email, :user_name, :password)";

// stament
$stmt = $db->prepare($sql);

foreach ($users as $user){   

$stmt->bindParam(':full_name', $user['name']);
$stmt->bindParam(':email', $user['email']);
$stmt->bindParam(':user_name', $user['username']);
$password = password_hash($user['password'], PASSWORD_DEFAULT);
$stmt->bindParam(':password', $password);
                     
$stmt->execute();
}




