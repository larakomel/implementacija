<?php
 include_once 'header.php';
 ?>


<br>
<!--signup form-->
<div class="stran">
  <div id="kvadrat">
    <div id="okvir">
  <h3 id="naslov">Sign Up</h3>
  <a class="nav-link" style="color: white; font-size: 20px; text-align: center;" href="login.html">Log In</a>
  

  <div class="mreza">
    <form action="includes/signup.inc.php" method="post">
        <label for="fname">Ime:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Priimek:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="adress">Ulica in hišna številka:</label><br>
        <input type="text" id="adress" name="adress"><br>
        <label for="city">Kraj:</label><br>
        <input type="text" id="city" name="city"><br>
        <label for="posta">Poštna številka:</label><br>
        <input type="number" id="posta" name="posta" min="1000" max="9265"><br>
        <label for="email">Email:</label><br>
        <input type="email"id="email" name="email"><br>
        <label for="pwd">Geslo:</label><br>
        <input type="password" id="pwd" name="pwd"><br>
        <label for="pnum">Telefonska številka:</label><br>
        <input type="tel" id="pnum" name="pnum"><br>
        <div id="submitreset">
        <input type="Submit" name="submit" value="Sign Up">
        <input type="reset"></div>
        </form>
  </div>
  </div>
  </div>
  </div>
   

    
    </div>
  </body>
</html>