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