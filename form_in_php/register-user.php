<h1>
   Dati registrazione utente
</h1>
<?php

print_r($_GET);

$test = filter_input(INPUT_GET,"email",FILTER_VALIDATE_EMAIL);

if ($test === false) {
    echo "\nla mail non è valida\n";
} else {
    echo "grazie la tua email è valida: $test";
}

?>