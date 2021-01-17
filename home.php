<?php

 include_once 'header.php';
 
 if(!isset($_SESSION["email"])){
  header("location: login.php");
}
 
 ?>

<br>
<div class="stran">
<a class="nav-link" style="color: black; font-size: 20px; text-align: center;" href="novonarocilo.php">Oddaj novo naročilo</a>
</div>
<div class="stran">
<div class="narocilo">
<h6> Naročilo: 65436756734</h6>
   <h6> Trgovina </h6>
   <h6> Kraj </h6>
   <h6> Število artiklov </h6>
   
  </div>
</div>
    </div>
  </body>
</html>