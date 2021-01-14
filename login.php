<?php
 include_once 'header.php';
 ?>
<br>
<!--signup form-->
<div class="stran">
  <div id="kvadrat">
    <div id="okvir">
  <h3 id="naslov">Log In</h3>
  <a class="nav-link" style="color: white; font-size: 20px; text-align: center;" href="signup.php">Sign Up</a>
  

  <div class="mreza">
    <form action="includes/signup.inc.php" method="post">
        
        <label for="email">Email:</label><br>
        <input type="email"id="email" name="email"><br>
        <label for="pwd">Geslo:</label><br>
        <input type="password" id="pwd" name="pwd"><br>
        <div id="submitreset">
        <input type="submit" value="Log in">
        </div>
        </form>
  </div>
  </div>
  </div>
  </div>
   

    
    </div>
  </body>
</html>