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
   //ideja: dva for loopa, en sprinta vsako narocilo z id-jem uporabnika,
   //drugi znotraj, sprinta vsak element $izd = explode(",", $izdelki); kot element v <li>
   $uid = $_SESSION["userid"];
   $sql = "select * from Narocilo where u_id='$uid';";
   $result = mysqli_query($connection, $sql);
   //echo "<h6> my id: ".$uid."</h6>";
   
   while ($row = mysqli_fetch_array($result)){
    //foreach($row as $value){ 
    echo "<div class='stran'>";
    echo '<div class="narocilo">';
     echo "<h5> Naročilo ID: ".$row['id']."</h5>";
         $izd = explode(",", $row['seznam_produktov']);
         echo "<ul style='text-align:left;'>";
         foreach ($izd as $izdelek){
           echo "<li>".$izdelek."</li>";
         }
     
     
         echo "</ul>";
     echo "</div>";
     echo "</div>";
   //}
  }

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
   <div class="narocila">
  <h5>Moja sprejeta naročila</h5>
</div>

  </body>
</html>