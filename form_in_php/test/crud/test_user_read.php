<?php

use crud\UserCRUD;
use models\User;

include "./form_in_php/config1.php";
include "form_in_php/test/test_autoload.php";

(new PDO(DB_DNS,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");

$crud = new UserCRUD();
$user = new User();
// $user->first_name="Isa";
// $user->last_name="Bella";
// $user->birthday="1990-03-20";
// $user->birth_city="Milano";
// $user->regione_id="9";
// $user->provincia_id="57";
// $user->gender="F";
// $user->username="isa@gmail.com";
// $user->password=md5('Password');

// $result = $crud->read();
// if ($result ===false) {
//     echo "\ntabella vuota\n";
// }
// print_r($result);

// $crud->create($user);
// $result = $crud->read(1);
// if(class_exists(User::class)&& get_class($result) == User::class){
//     echo "\ntest superato\n";
// }
// print_r($result);
// $result = $crud->read(2);
// if($result === false){
//     echo "\nutente non esistente\n";
// }
// print_r($result);
// $result = $crud->read();
// if (is_array($result) && count($result) ===1) {
//     echo "\nricerca tutti gli utenti\n";
// }
// print_r($result);

// $crud->update($user);

// $result = $crud->delete(1);
// $result = $crud->read(1);
// if($result === false){
//     echo "\nutente non esistente\n";
// }
