<?php

print_r($_POST);

$first_name = filter_input(INPUT_POST,"first_name");
//var_dump($first_name); null se non passo dal form,"" se non compilo, whitespace char restituisce una stringa di spazi, restituisce una stringa se compilato
if ($first_name === false) {
    echo "\nregistrazione fallita\n";
} else {
    echo "nome accettato: $first_name.\n";
}

$last_name = filter_input(INPUT_POST,"last_name");
if ($last_name === false) {
    echo "\nregistrazione fallita\n";
} else {
    echo "cognome accettato: $last_name.\n";
}

$birthday = filter_input(INPUT_POST,"birthday");
if ($birthday === false) {
    echo "\nregistrazione fallita\n";
} else {
    echo "data accettata: $birthday.\n";
}

$birth_place = filter_input(INPUT_POST,"birth_place");
if ($birth_place === false) {
    echo "\nregistrazione fallita\n";
} else {
    echo "luogo accettato: $birth_place.\n";
}

$gender = filter_input(INPUT_POST,"gender");
if ($gender === false) {
    echo "\nregistrazione fallita\n";
} else {
    echo "gender accettato: $gender.\n";
}

$username = filter_input(INPUT_POST,"username",FILTER_VALIDATE_EMAIL);
if ($username === false) {
    echo "\nregistrazione fallita\n";
} else {
    echo "mail valida: $username.\n";
}

$password = filter_input(INPUT_POST,"password");
if ($password === false) {
    echo "\nregistrazione fallita\n";
} else {
    echo "password valida: $password.\n";
}


?>