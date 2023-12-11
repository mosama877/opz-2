<?php
session_start() ;
include 'core/functions.php' ;

session_destroy();
header('location:login.php');
die;