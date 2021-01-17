<?php

if(isset($_POST["submit"])){
    $trgovina = $_POST["trgovina"];
    $izdelki = $_POST["izdelki"];
    $trgposta = $_POST["trgposta"];
    $trgcity = $_POST["trgcity"];
    
    
    $izd = explode(",", $izdelki);


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(orderIncomplete($trgovina, $izdelki, $trgposta, $trgcity) !== false){
        header("location: ../novonarocilo.php?error=emptyinput");
        exit();
    }

    createOrder($connection, $trgovina, $izdelki, $trgposta, $trgcity);
}else{
    header("location: ../novonarocilo.php");
    exit();
}