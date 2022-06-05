<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "booki";
$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$connect )
{

	die("failed to connect!");
}