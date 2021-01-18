<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
//za mail
if(isset($_POST["submit"])){
    


   //if(($_POST["email"])){
    if(isset($_GET["email"])){
    session_start();
    $email = $_POST["email"];
    $userid = $_SESSION["userid"];
    if(empty($email)){
        header("location: ../edit.php?error=emptyinput");
        exit();
    }  
    changeEmail($connection, $email, $userid);
    //echo ''.$email.'';
    //echo ''.$userid.'';
}

    //session_start();
    //if(($_POST["naslovv"])){
    if(isset($_GET["naslov"])){
        session_start();
    $adress = $_POST["naslovv"];
    $city = $_POST["mesto"];
    $posta = $_POST["posta"];
    $userid = $_SESSION["userid"];
    if(empty($adress)|| empty($city)||empty($posta)){
        header("location: ../edit.php?error=emptyinput");
        exit();
    } 
    changeNaslov($connection,$adress,$city,$posta, $userid);
}

  //session_start();
  //if(($_POST["pnum"])){
    if(isset($_GET["tel"])){
    session_start();
  $fon = $_POST["pnum"];
  $userid = $_SESSION["userid"];
  if(empty($fon)){
    header("location: ../edit.php?error=emptyinput");
    exit();

} 
  changeTel($connection, $fon, $userid);
}
    
        
}
else{
        header("location: ../login.php?error=nvem");
        exit(); 
    }