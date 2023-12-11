<?php
session_start(); 
include '../core/functions.php';
include '../core/validations.php';
if( checkRequestMethod('POST')){
    foreach($_POST as $key => $value) {
        $$key = recivebeInput($value);
    }
    $errors = [] ;
    if(requiredval($name) == false){
        $errors['error_name']= "name is required";
    }elseif(minval($name , 3) == false){
        $errors['error_name'] = "name must be greater than 3 chars";
    }
    elseif(maxval($name , 23) == false){
        $errors['error_name'] = "name must be smaller than 23 chars";
    }
    if(requiredval($email) == false){
        $errors['error_email']= "email is required";
    }
    elseif(emailval($email) == false){
        $errors['error_email']= "email is false";
    }
    if(requiredval($Password) == false){
        $errors['error_password']= "Password is required";
    }elseif(minval($Password , 6) == false){
        $errors['error_password'] = "Password must be greater than 6 chars";
    }
    elseif(maxval($Password , 20) == false){
        $errors['error_password'] = "Password must be smaller than 20 chars";
    }
    if(empty($errors)){
        $users_file = fopen('../data/users.csv', 'a+');
        $data = [$name , $email , sha1($Password)];
        fputcsv($users_file , $data);
        $_SESSION['auth'] = [$name , $email];
        header("location:../index.php");
        die ;
    }
    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        header("location:../register.php");
        die ; 
    }
}        