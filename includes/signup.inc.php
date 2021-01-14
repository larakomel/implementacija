<?php

//ce pridemo do signup preku url in ne submit gumba, avtomaticno poslje na signup.php
if(isset($_POST["submit"])){
    $name = $_POST["fname"];
    $lastname = $_POST["lname"];
    $adress = $_POST["adress"];
    $city = $_POST["city"];
    $posta = $_POST["posta"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pnum = $_POST["pnum"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    

    //ce kateri podatek manka 
    if(SignUpIncomplete($name, $lastname, $adress, $city, $posta, $email, $pwd, $pnum) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
   
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if(takenEmail($connection, $email) !== false){
        header("location: ../signup.php?error=takenEmail");
        exit();
    }
    
    createUser($connection, $name, $lastname, $pnum, $adress, $city, $posta, $email, $pwd);


}
else{
    header("location: ../signup.php");
    exit();
}