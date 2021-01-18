<?php
 include_once 'header.php';
 require_once 'includes/dbh.inc.php';
 require_once 'includes/functions.inc.php';

 if(isset($_GET["varname"])){
   $idnarocila = $_GET["varname"];
   $userid = $_SESSION["userid"];
   echo "<h3> id nar: ".$idnarocila."</h3>";
   echo "<h3> id moj: ".$userid."</h3>";
   header("location: profile.php");
   sprejmiNarocilo($connection, $idnarocila, $userid);

 }
 ?>
<br>
<div class="stran">
  <div class = "profil">
    <div class="profilna">
      <img src="profilna.png" alt="logo" style="width:150px; border-radius: 50%;">
    </div>
    <?php
    echo "<h3>".$_SESSION["ime"]." ".$_SESSION["priimek"]."</h3>";
    ?>
    <div class="izbira">
      <a class="nav-link" style="color: black; font-size: 20px;" href="omeni.php">O meni</a>  
    </div>
</div>
<br>


</div>

<div class="narocila">

  <h5>Moja oddana naročila</h5>
</div>
<?php
//echo "<div class='stran'>";
//echo '<div class="narocilo">';
require_once 'includes/dbh.inc.php';

$uid = $_SESSION["userid"];
$sql = "select * from Narocilo where u_id = '$uid';";
$result = mysqli_query($connection, $sql);
//echo "<h6> my id: ".$uid."</h6>";

while ($row = mysqli_fetch_array($result)){
  //za lokacijo trgovine
  $lok_id = $row["l_id"];
  $nar_id = $row["u_id"];
  $sqlKrajTrg = "select * from Lokacija where id='$lok_id';"; 
  $resultLok = mysqli_query($connection, $sqlKrajTrg);
  $rowLok = mysqli_fetch_array($resultLok);

  //tel dostavljalca
  $dost_id = $row['dost_id'];
  $sqltel = "select * from Uporabnik where id='$dost_id';"; 
  $resulttel = mysqli_query($connection, $sqltel);
  $rowtel = mysqli_fetch_array($resulttel);
  
  //za lokacijo uporabnika
  $sqlUpor = "select naslov, kraj, postna_st from Uporabnik where id= '$nar_id';";
  $resultUpor = mysqli_query($connection, $sqlUpor);
  $rowUpor = mysqli_fetch_array($resultUpor);
 echo "<div class='stran'>";
 echo '<div class="narocilo">';
 echo "<h5> Naročilo ID: ".$row['id']."</h5>";
 echo "<h6> Trgovina: ".$row['trgovina']."</h6>";
 echo "<h6> Iz kraja: ".$rowLok['mesto']." , ".$rowLok['postna_st']."</h6>";
 echo "<h6> Dostava na naslov: ".$rowUpor['naslov'].", ".$rowUpor['kraj']." , ".$rowUpor['postna_st']."</h6>";
 if($row['dost_id']==0){
  echo "<h6 style='color:red;'> Naročilo še ni bilo sprejeto! </h6>";
 }else{
  echo "<h6 style='color:green;'> Naročilo je bilo sprejeto! </h6>";
  echo "<h6><b> Telefonska številka dostavljalca: ".$rowtel['telefonska_stevilka']."</b></h6>";
 }

      $izd = explode(",", $row['seznam_produktov']);
      echo "<h5 style='text-align:left;'>Seznam izdelkov: </h5>";
      echo "<ul style='text-align:left;'>";
      foreach ($izd as $izdelek){
        echo "<li>".$izdelek."</li>";
      }
  
      
      echo "</ul>";
      $idd = $row['id'];
      if($row['dost_id']==0){
        echo "<form method = 'get' action='includes/preklic.inc.php'>";
         //echo "<input type='hidden' name='$idd' value='$idd2'>";
         echo "<label for='neki'>Prekliči to naročilo: </label>";
         echo "<input type ='submit' name='preklic' value = '$idd'>";
       }else{
        echo "<form method = 'get' action='includes/zakljuceno.inc.php'>";
         //echo "<input type='hidden' name='$idd' value='$idd2'>";
         echo "<label for='neki'>Potrdi prejeto naročilo: </label>";
         echo "<input type ='submit' name='preklic' value = '$idd'>";
       }
      //echo "</form";
      
  echo "</div>";
  echo "</div>";
     }
   
     
   //}
  
  

   //<h6> Naročilo: 65436756734</h6>
   //<h6> Naročilo še ni bilo sprejeto </h6>
   //<ul>
  //<li>Coffee</li>
  //<li>Tea</li>
  //<li>Milk</li>
//</ul>

//echo "</div>";
//echo "</div>";
   ?>
   <hr/>
   <div class="narocila">
  <h5>Moja sprejeta naročila</h5>
  </div>
  <?php
     require_once 'includes/dbh.inc.php';

     $uid = $_SESSION["userid"];
     $sql = "select * from Narocilo where dost_id = '$uid';";
     $result = mysqli_query($connection, $sql);
     //echo "<h6> my id: ".$uid."</h6>";
     
     while ($row = mysqli_fetch_array($result)){
       //za lokacijo trgovine
       $lok_id = $row["l_id"];
       $nar_id = $row["u_id"];
       $sqlKrajTrg = "select * from Lokacija where id='$lok_id';"; 
       $resultLok = mysqli_query($connection, $sqlKrajTrg);
       $rowLok = mysqli_fetch_array($resultLok);
       
       //za lokacijo uporabnika
       $sqlUpor = "select telefonska_stevilka, naslov, kraj, postna_st from Uporabnik where id= '$nar_id';";
       $resultUpor = mysqli_query($connection, $sqlUpor);
       $rowUpor = mysqli_fetch_array($resultUpor);
      echo "<div class='stran'>";
      echo '<div class="narocilo">';
      echo "<h5> Naročilo ID: ".$row['id']."</h5>";
      echo "<h6><b> Telefonska številka naročnika: ".$rowUpor['telefonska_stevilka']."</b></h6>";
      echo "<h6> Trgovina: ".$row['trgovina']."</h6>";
      echo "<h6> Iz kraja: ".$rowLok['mesto']." , ".$rowLok['postna_st']."</h6>";
      echo "<h6> Dostava na naslov: ".$rowUpor['naslov'].", ".$rowUpor['kraj']." , ".$rowUpor['postna_st']."</h6>";
           $izd = explode(",", $row['seznam_produktov']);
           echo "<h5 style='text-align:left;'>Seznam izdelkov: </h5>";
           echo "<ul style='text-align:left;'>";
           foreach ($izd as $izdelek){
             echo "<li>".$izdelek."</li>";
           }
       
           
           echo "</ul>";
           //echo "</form";
           
       echo "</div>";
       echo "</div>";
          }
   
   ?>
<hr/>
<div class="narocila">
  <h5>Pretekla naročila</h5>
  </div>
  <?php
     require_once 'includes/dbh.inc.php';

     $uid = $_SESSION["userid"];
     $sql = "select * from stara_narocila where u_id = '$uid';";
     $result = mysqli_query($connection, $sql);
     //echo "<h6> my id: ".$uid."</h6>";
     
     while ($row = mysqli_fetch_array($result)){
       //za lokacijo trgovine
       $lok_id = $row["l_id"];
       $dost_id = $row["dost_id"];
       $sqlKrajTrg = "select * from Lokacija where id='$lok_id';"; 
       $resultLok = mysqli_query($connection, $sqlKrajTrg);
       $rowLok = mysqli_fetch_array($resultLok);

       //tel dostavljalca
       $sqltel = "select * from Uporabnik where id='$dost_id';"; 
       $resulttel = mysqli_query($connection, $sqltel);
       $rowtel = mysqli_fetch_array($resulttel);
       //za lokacijo uporabnika
       $sqlUpor = "select naslov, kraj, postna_st from Uporabnik where id= '$uid';";
       $resultUpor = mysqli_query($connection, $sqlUpor);
       $rowUpor = mysqli_fetch_array($resultUpor);
      echo "<div class='stran'>";
      echo '<div class="narocilo">';
      echo "<h5> Naročilo ID: ".$row['id']."</h5>";
      echo "<h6><b> Telefonska številka dostavljalca: ".$rowtel['telefonska_stevilka']."</b></h6>";
      echo "<h6> Trgovina: ".$row['trgovina']."</h6>";
      echo "<h6> Iz kraja: ".$rowLok['mesto']." , ".$rowLok['postna_st']."</h6>";
      echo "<h6> Dostava na naslov: ".$rowUpor['naslov'].", ".$rowUpor['kraj']." , ".$rowUpor['postna_st']."</h6>";
           $izd = explode(",", $row['seznam_produktov']);
           echo "<h5 style='text-align:left;'>Seznam izdelkov: </h5>";
           echo "<ul style='text-align:left;'>";
           foreach ($izd as $izdelek){
             echo "<li>".$izdelek."</li>";
           }
       
           
           echo "</ul>";
           //echo "</form";
           
       echo "</div>";
       echo "</div>";
          }
   
   ?>

  </body>
</html>