<?php

class ValidateDate implements Validable
{
    public function isValid($value)
    {
        $valueWidoutSpace = trim(strip_tags($value));
        $d = DateTime::createFromFormat('j/n/Y', $valueWidoutSpace);
        if($d){
            return $d->format('j/n/Y');
        }else{
            return $d;
        };
    }
       public function message()
       {
        return 'data non valida';
       }
}