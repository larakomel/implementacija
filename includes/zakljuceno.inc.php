<?php
 include_once '../header.php';
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';

//$neki = $_SESSION['idk'];
$idnarocila = $_GET["preklic"];
$userid = $_SESSION["userid"];

zakljucenoNarocilo($connection, $idnarocila);
prekliciNarocilo($connection, $idnarocila, $userid);