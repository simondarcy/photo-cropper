<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'imgstore';


//live settings, comment out during developemnt


$host = 'localhost';
$user = 'simondar_admin';
$pass = 'NokiaN900$';
$db = 'simondar_games';


//godaddy settings
/*
$host = 'localhost';
$user = 'pp_admin';
$pass = 'dallas81';
$db = 'prizepigs';
*/
$link = new mysqli($host, $user, $pass, $db) or die("Whoops, cannot connect to database");
?>