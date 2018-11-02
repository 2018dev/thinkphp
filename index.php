<?php
error_reporting(0);
//var_dump($_SERVER);
$conn = new mysqli('127.0.0.1',"coding",'coding');
var_dump((array)$conn);
if(!$conn){
    exit($conn->error);
}
$result = $conn->query('SHOW DATABASES;');
var_dump($result);