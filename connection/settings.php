<?php
session_start();
$host="localhost"; // Host name
$username="homestead"; // Mysql username
$password="secret"; // Mysql password
$db_name="dustindb"; // Database name

// Connect to server and select databse.
$con = new mysqli("$host", "$username", "$password", $db_name);
$GLOBALS['con'] = $con;
