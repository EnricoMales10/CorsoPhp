<?php

use crud\UserCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";

(new PDO(DB_DNS,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");

$crud = new UserCRUD();
$user = new User();
$user->first_name="Isa";
$user->last_name="Bella";
$user->birthday="1990-03-20";
$user->birth_city="Milano";
$user->regione_id="9";
$user->provincia_id="57";
$user->gender="F";
$user->username="isa@gmail.com";
$user->password=md5('Password');

$crud->create($user);
$result = $crud->read();
if (count($result) ==1) {
   echo "test utente inserito ok\n";
}
print_r($result);
try {
    $crud->create($user);
} catch (\Throwable $th) {
    if($th->getCode() == "23000"){
        echo "Test superato";
    };
}

