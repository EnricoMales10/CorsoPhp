<h1>
   Dati registrazione utente
</h1>
<?php

print_r($_POST);

$test = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);

echo "\n";

if ($test === false) {
    echo "\nla mail non è valida\n";
} else {
    echo "grazie la tua email è valida: $test";
}

?>