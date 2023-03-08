<?php

include "config.php";

$province_string = file_get_contents('province.json');

$province_object = json_decode($province_string);


$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);
    $conn->query('TRUNCATE TABLE Provincia;');

    

} catch (\Throwable $th) {
    throw $th;
}   

?>