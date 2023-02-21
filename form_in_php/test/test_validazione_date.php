<?php
require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateDate.php";

$testDates = [
    [
        'input' => '',
        'expected' => false 
    ],
    [
        'input' => '       ',
        'expected' => false 
    ],
    [
        'input' => '01/04/2022      ',
        'expected' => '1/4/2022'
    ],
    [
        'input' => '13/13/2022',
        'expected' => false
    ],
    [
        'input' => '32/13/2022',
        'expected' => false
    ],
    [
        'input' => '1\12\2022',
        'expected' => '1/12/2022'
    ],
    [
        'input' => '1.12.2022',
        'expected' => '1/12/2022'
    ],
    [
        'input' => '1z/12i/p20p22',
        'expected' => '1/12/2022'
    ],
    [
        'input' => '    20/5/2023',
        'expected' => '20/5/2023'
    ],
    [
        'input' => ' 20/5/2023 ',
        'expected' => '20/5/2023'
    ],
    [
        'input' => '<h1>20/5/2023</h1>',
        'expected' =>'20/5/2023'
    ],
    [
        'input' => '<b>20/10/2023</b>',
        'expected' =>'20/10/2023'
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
        'input' => '<b>20/1/2023 ',
        'expected' =>'20/1/2023'
    ],
    [
        'input' => '20/1/2023</b> ',
        'expected' =>'20/1/2023'
    ],
    [
        'input' =>20,
        'expected' =>false
    ],
    [
        'input' => 0,
        'expected' =>false
    ]
];

$d = new ValidateDate();

foreach ($testDates as $key => $test) {
    $input = $test['input'];
    $expected = $test['expected'];   

    if($d->isValid($input) != $expected){
echo "Test numero $key non superato: Mi aspettavo: ";
var_dump($expected);
echo "ma ho trovato ";
var_dump($d->isValid($input));
    };
}