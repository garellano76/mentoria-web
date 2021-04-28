<?php

require "util/db.php";

$sql ="DELETE FROM users WHERE ID = :id";

$db = connectDB();
$stmt = $db->prepare($sql);

$stmt->bindParam(':id', $_GET['id']);
                 
$stmt->execute();

header("Location: index.php");

?>