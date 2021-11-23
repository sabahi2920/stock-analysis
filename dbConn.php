<?php
$dbserver = "localhost";
$dbusername = "stockanalysis_root";
$dbpass = "%2Y&?JfcO-u$";
$dbname = "stockanalysis_db";

$db = mysqli_connect($dbserver, $dbusername, $dbpass, $dbname);
if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>