<?php
use models\User;
require "form_in_php/test/test_autoload.php";

//$colore = "blue";
//$colore = "verde";
//variabili di variabili
//echo $$colore;
//echo $colore;
//new $colore();
//die();


# php form_in_php/test/crud/test_array_to_user.php


//simula un $_POST
$class_array = [
"first_name"=>"Jack",
"last_name"=>"Dawson",
"birthday"=>"1900-12-20",
"birth_city"=>"Torino",
"regione_id"=>96,
"provincia_id"=>12,
"gender"=>"M",
"username"=>"Jack@gmail.com",
"password"=>"jack"
];

//$class_name = User::class;
//$user = new $class_name;
$user = User::arrayToUser($class_array);
if(get_class($user)== User::class){
    echo "test passato";
    print_r($user);
}
