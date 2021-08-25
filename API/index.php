<?php

$dsn = "mysql:host=localhost;dbname=registro";
$username = "admin";
$password = "user1";
$pdo = new \PDO($dsn, $username, $password);

$sql = "SELECT * FROM users";
$statement  = $this->pdo->prepare($sql);
$statement->execute();

$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($rows);