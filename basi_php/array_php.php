<?php

$nome = "Mario";
echo "\tciao $nome \n";
echo '\t ciao $nome \n';
echo "\n-----------";
# Index Array
// $colori = array();
$colori = ['red', 'green', 'blue'];

echo "\n" . $colori[2] . "\n";
echo "-----------\n";
#associative Array (Hashmap)
$persona = [
    "nome" => "Mario",
    "cognome" => "Rossi",
    "email" => "a@b.it"
];

// console.log(persona)
# print_r stampa dati complessi mentre echo no
print_r($persona);
echo "-----------\n";
echo $persona["email"];
echo "\n-----------\n";
//var_dump($persona) #come il print_r può stampare dati complessi;

$classe = array(
    [
        "nome" => "Mario",
        "cognome" => "Rossi",
        "email" => "a@b.it"
    ],
    [
        "nome" => "Giuseppe",
        "cognome" => "Verdi",
        "email" => "g@b.it"
    ]

);

print_r($classe[1]["cognome"] . "\n");
echo "-----------\n";
# Imperativo 
echo "For loop:\n";
for ($i = 0; $i < count($classe); $i++) {
    $allievo = $classe[$i];
    echo $allievo["nome"] . "\n";
}
echo "-----------\n";
echo "Foreach loop:\n";

foreach ($classe as $i => $allievo) {
    echo($i+1).")". $allievo["nome"];
    echo "\n";
}
echo "-----------\n";

# dichiarativo / funzionale
$stampaNome = function ($allievo) {
    echo $allievo["nome"] . "\n";
};

echo "Map di un array:\n";
array_map($stampaNome,$classe);
# altra possibilità
echo "Map array 2:\n---------\n";
function stampaNome($allievo) {
    echo $allievo["nome"] . "\n";
}
array_map("stampaNome",$classe);
