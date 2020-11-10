<?php

$DB_LOCALHOST	= 'localhost';
$DB_USER     	= 'root';
$DB_PASSWORD 	= '';
$DB_DB  		= 'test';

$db = new PDO("mysql:host=$DB_LOCALHOST;dbname=$DB_DB;charset=utf8",$DB_USER,$DB_PASSWORD);


require_once "function.php";

?>