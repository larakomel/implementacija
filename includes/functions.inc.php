<?php

//ali je bilo kaj pusceno prazno
function SignUpIncomplete($name, $lastname, $adress, $city, $posta, $email, $pwd, $pnum){
   $result;
   if(empty($name) || empty($lastname) || empty($adress) || empty($city) || empty($posta) || empty($email) || empty($pwd) || empty($pnum) || empty($lastname)){
      $result=true;
   }else{
       $result = false;
   }
   return $result;
}


//preveri ali je podano res email
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $result=true;
    }else{
        $result = false;
    }
    return $result;
 }

 function takenEmail($connection, $email){
     $sql = "select * from Uporabnik WHERE elektronska_posta = ?;";
     $stmt = mysqli_stmt_init($connection);
     if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
     }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
      return $row;
    }else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
 }



 function createUser($connection, $name, $lastname, $pnum, $adress, $city, $posta, $email, $pwd){
    

    $sql = "insert into Uporabnik (ime, priimek, telefonska_stevilka, naslov, kraj, postna_st, elektronska_posta, geslo) values (?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($connection);
     if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
     }
     $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
     mysqli_stmt_bind_param($stmt, "ssississ", $name, $lastname, $pnum, $adress, $city, $posta, $email, $hashedPwd);
     mysqli_stmt_execute($stmt);

     mysqli_stmt_close($stmt);
     echo "Registracija uspešna";
     header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($email, $pwd){
    $result;
   if(empty($email) || empty($pwd))){
      $result=true;
   }else{
       $result = false;
   }
   return $result;
}

function loginUser($connection, $email, $pwd){
   $emailTaken = takenEmail($connection, $email);
   
}

 