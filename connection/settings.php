<?php
session_start();
$host="localhost"; // Host name
$username="dustin"; // Mysql username
$password="dusin"; // Mysql password
$db_name="dustin"; // Database name

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password")or die("Can't connect " . mysql_error());
mysql_select_db("$db_name")or die("Cannot select DB" . mysql_error());


?>