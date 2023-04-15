<?php
use crud\UserCRUD;

require "./config1.php";
require "./autoload.php";

// print_r($_GET['user_id']); 
$user_id = filter_input(INPUT_GET,'user_id',FILTER_VALIDATE_INT);
// var_dump($user_id);
if($user_id){
    (new UserCRUD)->delete($user_id);
    header("location: index.php");
}else{
    echo "problemi";
}