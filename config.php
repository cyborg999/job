<?php
// local
$server 	= "localhost";
$db 		= "jobs";
$username 	= "root";
$charset 	= "utf8";
$password 	= "";



// // //live
// $server 	= "sugarbait.ml";
// $db 		= "sugarbait";
// $username 	= "root";
// $charset 	= "utf8";
// $password 	= "M@r1c3l@2018";





$db = new PDO("mysql:host=$server;dbname=$db;charset=$charset", $username, $password);
