<?php

$serverName = "localhost";
$dBUsername = "codeigniter";
$dBPassword = "codeigniter2019";
$dBName = "SISIII_89191056";

$connection = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$connection){
    die("Connection failed: " . mysqli_connect_error());
}