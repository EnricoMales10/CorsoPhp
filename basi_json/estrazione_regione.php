<?php

include "config.php";
$province_string = file_get_contents('province.json');
$province_object  = json_decode($province_string);

$regioni_array = array_map(function ($provincia) {
    return $provincia->regione;
}, $province_object);

$regioni_unique = array_unique($regioni_array);
sort($regioni_unique);

$dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;

try {
    $conn = new PDO($dns, DB_USER, DB_PASSWORD);

    $conn ->query('TRUNCATE TABLE regione');

    foreach ($regioni_unique as $regione) {
        $regione = addslashes($regione);
        $sql = "INSERT INTO regione (nome) VALUES('$regione');";
        $conn->query($sql);
    }
} catch (\Throwable $th) {
    throw $th;
}


print_r($regioni_unique);
