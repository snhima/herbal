<?php

$dbServer="localhost";
$dbUser="root";
$dbPass="";
$dbName="qas";
$dbKoneksi=mysql_connect($dbServer,$dbUser,$dbPass);
mysql_select_db($dbName);

?>