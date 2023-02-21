<?php

class ValidateMail implements Validable {
    public function isValid($email): bool {
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }
}