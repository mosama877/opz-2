<?php
session_start();
include '../core/functions.php';
include '../core/validations.php';
if( checkRequestMethod('POST')){
    foreach($_POST as $key => $value) {
        $$key = recivebeInput($value);

    }

    $errors = [] ;
    if(requiredval($email) == false){
        $errors['error_email']= "email is required";
    }
    
    if(requiredval($Password) == false){
        $errors['error_Password']= "Password is required";
    }
    elseif(minval($Password , 6) == false){
        $errors['error_Password'] = "Password must be greater than 6 chars";
    }
    elseif(maxval($Password , 20) == false){
        $errors['error_Password'] = "Password must be smaller than 20 chars";
    }
    $Password = sha1($Password) ;
    
    $file = '../data/users.csv';
    $csv = array();

if (($handle = fopen($file, 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        $csv[] = $data;
    }
    fclose($handle);
}
foreach($csv as $user){
    // echo print_r($user[1] ) . "<br>";
    if($email == $user[1] && $Password == $user[2] ){
        $_SESSION['auth'] = $user ;
        header("location:../index.php");
    }
    if($email != $user[1] && $Password == $user[2] ){
        $errors['error'] = " email are wrong";
    }
    if($email == $user[1] && $Password != $user[2] ){
        $errors['error'] = " Password are wrong";
    }
    
}


    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        header("location:../login.php");
        die ; 
    }
}