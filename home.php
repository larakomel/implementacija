<?php

 include_once 'header.php';
 
 if(!isset($_SESSION["email"])){
  header("location: login.php");
}
 
 ?>

<br>

<div class="stran">
<a class="nav-link" style="color: black; font-size: 20px; text-align: center; background-color: rgb(152, 196, 216); margin:30px;" href="novonarocilo.php">Oddaj novo naročilo</a>
<br>
</div>

<div class="stran">
<h3>Naročila:</h3>
<br>
</div>

<?php
   require_once 'includes/dbh.inc.php';

   $uid = $_SESSION["userid"];
   $sql = "select * from Narocilo where dost_id = '0';";
   $result = mysqli_query($connection, $sql);
   //echo "<h6> my id: ".$uid."</h6>";
   
   while ($row = mysqli_fetch_array($result)){
     //za lokacijo trgovine
     $lok_id = $row["l_id"];
     $sqlKrajTrg = "select * from Lokacija where id='$lok_id';"; 
     $resultLok = mysqli_query($connection, $sqlKrajTrg);
     $rowLok = mysqli_fetch_array($resultLok);
     
     //za lokacijo uporabnika
     $sqlUpor = "select kraj, postna_st from Uporabnik where id= '$uid';";
     $resultUpor = mysqli_query($connection, $sqlUpor);
     $rowUpor = mysqli_fetch_array($resultUpor);
    echo "<div class='stran'>";
    echo '<div class="narocilo">';
    echo "<h5> Naročilo ID: ".$row['id']."</h5>";
    echo "<h6> Trgovina: ".$row['trgovina']."</h6>";
    echo "<h6> Iz kraja: ".$rowLok['mesto']." , ".$rowLok['postna_st']."</h6>";
    echo "<h6> Dostava v kraj: ".$rowUpor['kraj']." , ".$rowUpor['postna_st']."</h6>";
         $izd = explode(",", $row['seznam_produktov']);
         echo "<h5 style='text-align:left;'>Seznam izdelkov: </h5>";
         echo "<ul style='text-align:left;'>";
         foreach ($izd as $izdelek){
           echo "<li>".$izdelek."</li>";
         }
     
         
         echo "</ul>";
         $idd = $row['id'];
         //$_SESSION['idk']=$idd2;
         //$idd = 'id'.$row['id'];
         
         echo "<form method = 'get' action='includes/sprejmi.inc.php'>";
         //echo "<input type='hidden' name='$idd' value='$idd2'>";
         echo "<label for='neki'>Sprejmi naročilo: </label><br>";
         echo "<input type ='submit' name='neki' value = '$idd'>";
         //echo "</form";
         
     echo "</div>";
     echo "</div>";
        }

//<div class="stran">
//<div class="narocilo">
//<h6> Naročilo: 65436756734</h6>
   //<h6> Trgovina </h6>
   //<h6> Kraj </h6>
   //<h6> Število artiklov </h6>
   
  //</div>
//</div>
?>
    
  </body>
</html>