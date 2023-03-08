<?php

include "config.php";

$province_string = file_get_contents('province.json');

$province_object = json_decode($province_string);


$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);
    $conn->query('TRUNCATE TABLE Provincia;');

    foreach ($province_object as $provincia) {
        $nome = addslashes($provincia->nome);
        $sigla = addslashes($provincia->sigla);
      
        $regione = $conn->query("SELECT regione_id FROM Regione WHERE nome=\"$provincia->regione\"");
        $regione_id= $regione->fetchColumn();
        
        $sql = "INSERT INTO Provincia (nome, sigla, regione_id) VALUES('".$nome."','".$sigla."',$regione_id);";
        echo $sql."\n";
        $conn->query($sql); 
    }

} catch (\Throwable $th) {
    throw $th;
}
