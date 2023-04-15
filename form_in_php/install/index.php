<?php 
include "../config1.php";
$query = file_get_contents("install.sql");
try {
    $conn = new PDO(DB_DNS,DB_USER,DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conn->query($query); 
} catch (\Throwable $th) {
    echo $th->getMessage();
}