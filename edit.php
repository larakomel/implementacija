<?php
 include_once 'header.php';
 require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
     echo "<p style='color: black; font-size: 20px; text-align: center;'>Empty field!</p>";
}}
if(isset($_GET["email"])){
    echo '<div class="stran">';
    echo '<div id="kvadrat">';
    echo '<div id="okvir">';
    echo '<h3 id="naslov">Spremeni email</h3>';
     
    echo '<form action="includes/edit.inc.php?email=<? php echo x ?>" method="post">';
        
    echo '<label for="email" style="color:white;">Nov email:</label><br>';
    echo '<input type="email"id="email" name="email"><br>';
    
    echo '<div id="submitreset">';
    echo '<input type="submit" name="submit" value="Spremeni">';
    echo '</div>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
if(isset($_GET["naslov"])){
    echo '<div class="stran">';
    echo '<div id="kvadrat">';
    echo '<div id="okvir">';
    echo '<h3 id="naslov">Spremeni naslov</h3>';
    
    echo '<form action="includes/edit.inc.php?naslov=<? php echo x ?>" method="post">';
        
    echo '<label for="naslovv" style="color:white;">Naslov:</label><br>';
    echo '<input type="text" id="naslovv" name="naslovv"><br>';

    echo '<label for="mesto" style="color:white;">Mesto:</label><br>';
    echo '<input type="text"id="mesto" name="mesto"><br>';

    echo '<label for="posta" style="color:white;">Pošta:</label><br>';
    echo '<input type="number"id="posta" name="posta"><br>';
    
    echo '<div id="submitreset">';
    echo '<input type="submit" name="submit" value="Spremeni">';
    echo '</div>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
if(isset($_GET["tel"])){
    echo '<div class="stran">';
    echo '<div id="kvadrat">';
    echo '<div id="okvir">';
    echo '<h3 id="naslov">Spremeni telefon</h3>';
    
    echo '<form action="includes/edit.inc.php?tel=<? php echo x ?>" method="post">';
        
    echo '<label for="pnum" style="color:white;">Nova številka:</label><br>';
    echo '<input type="tel"id="pnum" name="pnum"><br>';
    
    echo '<div id="submitreset">';
    echo '<input type="submit" name="submit" value="Spremeni">';
    echo '</div>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

 ?>
 </body>
</html>