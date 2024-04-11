<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "seu_banco_de_dados";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
?>