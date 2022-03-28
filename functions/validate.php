<?php

function checkEmpty($value){
    return empty($value) ? true : false ;
}

function checkMinChars($value,$minLength){
    return (trim(strlen($value) > $minLength)) ? true : false ;
}

function validEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return false;
    }else
    {
        return true;
    }

}
?>