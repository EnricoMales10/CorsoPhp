<?php

use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;

require "./config.php";

spl_autoload_register(function($className){

  $className = str_replace("\\","/",$className);

  require "./form_in_php/class/".$className.".php";
});

new ValidateMail();
new ValidateDate();
new ValidateRequired();

Regione::all();
Provincia::all();

