<?php

spl_autoload_register(function($className){
    $className = str_replace("\\","/",__DIR__."/class/".$className.'.php');
    require $className;
   });