<h1>
   Dati registrazione utente
</h1>
<?php

print_r($_POST);

$test = filter_input(INPUT_POST,"username",FILTER_VALIDATE_EMAIL);

if ($test === false) {
    echo "\nregistrazione fallita\n";
} else {
    echo "registrazione effettuata con successo: $test";
}

?>