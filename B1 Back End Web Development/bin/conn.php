<?php
$host="localhost";
$user="root";
$pass="";
$db="agranaratest";

$conn=mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
	die("Error Connection");
}