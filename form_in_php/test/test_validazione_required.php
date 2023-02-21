<?php
require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateRequired.php";
//ValidateRequired campo obbligatorio, quindi non deve essere vuoto
//false
//
$testCases = [
    [
        'input' => '',
        'expected' => false 
    ],
    [
        'input' => '       ',
        'expected' => false 
    ],
    [
        'input' => 'ciao       ',
        'expected' => 'ciao'
    ],
    [
        'input' => '    ciao',
        'expected' => 'ciao'
    ],
    [
        'input' => ' ciao ',
        'expected' => 'ciao'
    ],
    [
        'input' => '<h1>ciao</h1>',
        'expected' =>'ciao'
    ],
    [
        'input' => '<b>ciao</b>',
        'expected' =>'ciao'
    ],
    [
        'input' => '<b>    </b>',
        'expected' => false
    ],
    [
        'input' => ' <b></b>',
        'expected' =>false
    ],
    [
        'input' => '<b></b> ',
        'expected' =>false
    ],
    [
        'input' => ' <b></b> ',
        'expected' =>false
    ],
    [
        'input' => '<b> ',
        'expected' =>false
    ],
    [
        'input' => '<b>ciao ',
        'expected' =>'ciao'
    ],
    [
        'input' => 'ciao</b> ',
        'expected' =>'ciao'
    ],
    [
        'input' =>20,
        'expected' =>20
    ],
    [
        'input' => 0,
        'expected' =>0
    ]
];

$r = new ValidateRequired();

foreach ($testCases as $key => $test) {
    $input = $test['input'];
    $expected = $test['expected'];   

    if($r->isValid($input) != $expected){
echo "Test numero $key non superato: Mi aspettavo: ";
var_dump($expected);
echo "ma ho trovato ";
var_dump($r->isValid($input));
    };
}