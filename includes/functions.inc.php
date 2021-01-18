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
   if(empty($email) || empty($pwd)){
      $result=true;
   }else{
       $result = false;
   }
   return $result;
}


function userid($connection, $email){
   $sql = "select id from Uporabnik where elektronska_posta='$email';";
   $result = mysqli_query($connection, $sql);

   if(mysqli_num_rows($result) > 0 ){
   $row = mysqli_fetch_assoc($result);
   $idu = $row["id"];
   $_SESSION["userid"] = $idu;
   //return $result;
   }else{
      header("location: ../novonarocilo.php?error=sejnevem");
   }


}


function loginUser($connection, $email, $pwd){
   $emailTaken = takenEmail($connection, $email);
    
   if($emailTaken === false){
    header("location: ../login.php?error=wronglogin");
    exit();
   }

   $pwdHashed = $emailTaken["geslo"];
   $checkPwd = password_verify($pwd, $pwdHashed);

   if ($checkPwd === false){
    header("location: ../login.php?error=wronglogin");
    exit();
   }
   else if ($checkPwd === true){
     session_start();
     $sql = "select id from Uporabnik where elektronska_posta='$email';";
     $result = mysqli_query($connection, $sql);
     $row = mysqli_fetch_assoc($result);
     $idu = $row["id"];
     $_SESSION["userid"] = $idu;

     $sql2 = "select ime,priimek from Uporabnik where elektronska_posta='$email';";
     $result2 = mysqli_query($connection, $sql2);
     $row2 = mysqli_fetch_assoc($result2);
     $uname = $row2["ime"];
     $ulastname = $row2["priimek"];
     $_SESSION["ime"] = $uname;
     $_SESSION["priimek"] = $ulastname;
     //$_SESSION["userid"] = userid($connection, $email);
     //userid($connection, $email);
     //$_SESSION["email"] = $emailTaken["elektronska_posta"];
     $_SESSION["email"] = $email;
     header("location: ../home.php");
     exit();
  }
}

function orderIncomplete($trgovina, $izdelki, $trgposta, $trgcity){
   $result;
   if(empty($trgovina) || empty($izdelki) || empty($trgposta) || empty($trgcity)){
      $result=true;
   }else{
       $result = false;
   }
   return $result;
}
//sprejme mesto in ga ali ustvari v tabeli lokacija ali pa ga poisce, v obeh primerih vrne id lokacije
function idLokacije($connection, $trgposta, $trgcity){
   $sql = "select * from Lokacija WHERE mesto = '$trgcity' AND postna_st='$trgposta';";
   $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)>0){
            
            $l_idsql = "select id from Lokacija where mesto = '$trgcity' AND postna_st='$trgposta';";
            $l_id = mysqli_query($connection, $l_idsql);
            $row = mysqli_fetch_array($l_id);
            return $row['id'];
        }else{
           $sql2 = "insert into Lokacija (mesto, postna_st) values ('$trgcity', '$trgposta');";
           $l_id2 = mysqli_query($connection, $sql2);
           
           if ($l_id2) {
            $l_idsql = "select id from Lokacija where mesto = '$trgcity' AND postna_st='$trgposta';";
            $l_id = mysqli_query($connection, $l_idsql);
            $row = mysqli_fetch_array($l_id);
            return $row['id'];
            
           } else {
             echo "Error: " . $sql2 . "" . mysqli_error($connection);
             }
        }
}




function createOrder($connection, $trgovina, $izdelki, $trgposta, $trgcity){
   session_start();
   $userid = $_SESSION["userid"];
   $l_id = idLokacije($connection, $trgposta, $trgcity); //naj returna location id
   //$u_id = $_SESSION["userid"];
   

             $sql = "insert into Narocilo (seznam_produktov, trgovina, u_id, l_id, dost_id) values (?,?,?,?,'0');";
             $stmt = mysqli_stmt_init($connection);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 header("location: ../novonarocilo.php?error=stmtfailed");
                 exit();
              }
              
              mysqli_stmt_bind_param($stmt, "ssii", $izdelki, $trgovina, $_SESSION['userid'], $l_id );
              mysqli_stmt_execute($stmt);
          
              mysqli_stmt_close($stmt);
              echo "Naročilo uspešno oddano";
              header("location: ../novonarocilo.php?error=none");
             exit();
   
}

//dost_id pri narocilo mora nastavit na userid
function sprejmiNarocilo($connection, $idnarocila, $userid){
   $sql = "update Narocilo set dost_id = '$userid' where id = '$idnarocila';";
   $l_id = mysqli_query($connection, $sql);
   if ($l_id) {
      header("location: ../profile.php");
      
     } else {
       echo "Error: " . $sql . "" . mysqli_error($connection);
       }
}
 

function prekliciNarocilo($connection, $idnarocila, $userid){
   $sql = "delete from Narocilo where id = '$idnarocila';";
   $l_id = mysqli_query($connection, $sql);
   if ($l_id) {
      header("location: ../profile.php");
      
     } else {
       echo "Error: " . $sql . "" . mysqli_error($connection);
       }
}