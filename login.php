<?php
 include_once 'header.php';
 ?>
<br>
<!--signup form-->
<div class="stran">
  <div id="kvadrat">
    <div id="okvir">
  <h3 id="naslov">Log In</h3>
  <?php

     if(isset($_GET["error"])){
       if($_GET["error"]=="emptyimput"){
         echo "<p>Fill in all fields!</p>";
       } 
       else if ($_GET["error"] == "emptyinput"){
        echo "<p style='color: yellow; font-size: 20px; text-align: center;'>Empty field!</p>";
     }else if($_GET["error"]=="wronglogin"){
        echo "<p style='color: yellow; font-size: 20px; text-align: center;'>Wrong email/ password!</p>";
      }
    }
   ?>
  <a class="nav-link" style="color: white; font-size: 20px; text-align: center;" href="signup.php">Sign Up</a>
  

  <div class="mreza">
    <form action="includes/login.inc.php" method="post">
        
        <label for="email">Email:</label><br>
        <input type="email"id="email" name="email"><br>
        <label for="pwd">Geslo:</label><br>
        <input type="password" id="pwd" name="pwd"><br>
        <div id="submitreset">
        <input type="submit" name="submit" value="Log in">
        </div>
        </form>
  </div>
  </div>
  </div>
  </div>
   

    
    </div>
  </body>
</html>