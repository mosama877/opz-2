<?php
function requiredval($input){
    if(empty($input)){
        return false ;
    }else{
        return true ;
    }
}
function minval($input , $count){
    if (strlen($input) < $count){
        return false ; 
    }else{
        return true ;
    }
}
function maxval($input , $count){
    if (strlen($input) > $count){
        return false ; 
    }else{
        return true ;
    }
}
function emailval($email){
    if (!filter_var($email , FILTER_VALIDATE_EMAIL)){
        return false ; 
    }else{
        return true ;
    }
}