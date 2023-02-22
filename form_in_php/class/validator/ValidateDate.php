<?php

class ValidateDate implements Validable
{
    public function isValid($value)
    {
        $valueWidoutSpace = trim(strip_tags($value));
        $d = DateTime::createFromFormat('j/n/Y', $valueWidoutSpace);
       
            if($d && $d->format('j/n/Y') === $valueWidoutSpace){
                return $d->format('j/n/Y');
            }else{
                return false;
            };
            
    }
       public function message()
       {
        return 'data non valida';
       }
}
