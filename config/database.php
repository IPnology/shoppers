<?php
session_start();
$connect = @mysql_connect("localhost","root","") or die("Server is terrible");
mysql_select_db("db_cmecs",$connect) or die("i cant connect to it");

?>
