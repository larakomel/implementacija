<?php
 include_once '../header.php';
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';

//$neki = $_SESSION['idk'];
$idnarocila = $_GET["prejeto"];
$userid = $_SESSION["userid"];
//echo "<h5> moj id: ".$userid."</h5>";
//echo "<h5> Naročilo ID: ".$idnarocila."</h5>";
prekliciNarocilo($connection, $idnarocila, $userid);