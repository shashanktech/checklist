<?php

$user_name = "root";
$password = "";
$database = "app";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

 mysql_query("set time_zone = '+0:00' ");




?>