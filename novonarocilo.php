<?php
 include_once 'header.php';
 ?>

<div class="stran">
  <div id="kvadrat">
    <div id="okvir">
  <h3 id="naslov">Novo naročilo</h3><br>
  <?php

     if(isset($_GET["error"])){
       if($_GET["error"]=="emptyinput"){
         echo "<p style='color: yellow; font-size: 20px; text-align: center;'>Fill in all fields!</p>";
       } 
       else if($_GET["error"]=="stmtFailed"){
        echo "<p style='color: yellow; font-size: 20px; text-align: center;'>Something went wrong</p>";
      }else if($_GET["error"]=="none"){
        
        //echo "<p> User id: ". $_SESSION["userid"]." ,email: ".$_SESSION["email"]."</p>";
       
        echo "<p style='color: yellow; font-size: 20px; text-align: center;'>Order sucessful!</p>";
        }
    }
   ?>
  

  <div class="mreza">
    <form action="includes/novonarocilo.inc.php" method="post">
        <label for="trgovina">Trgovina:</label><br>
        <input type="text" id="trgovina" name="trgovina"><br>
        <label for="izdelki">Izdelki (ločeni z vejico):</label><br>
        <input type="text" id="izdelki" name="izdelki"><br>
        <label for="trgposta">Pošna številka trgovine:</label><br>
        <input type="text" id="trgposta" name="trgposta"><br>
        <label for="trgcity">Kraj trgovine:</label><br>
        <input type="text" id="trgcity" name="trgcity"><br>
        
        <div id="submitreset">
        <input type="submit" name="submit" value="Oddaj naročilo">
        <input type="reset"></div>
        </form>
  </div>
  </div>
  </div>
  </div>