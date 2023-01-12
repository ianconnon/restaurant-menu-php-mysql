<?php
// error_reporting(0);
session_start();
$connection = mysqli_connect('localhost','root','','menu');

if(!$connection){
    echo "Database connection error";
}