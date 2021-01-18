<?php
 include_once 'header.php';
 ?>

 
    <?php
    require_once 'includes/dbh.inc.php';
    $uid = $_SESSION["userid"];
    $sql = "select * from Uporabnik where id = '$uid';";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);
    echo "<div class='stran'>";
    echo '<div class="narocilo">';
    echo "<h3> O meni </h3>";
    echo "</div>";
    echo "</div>";

    echo "<div class='stran'>";
    echo '<div class="narocilo">';
    echo "<h5> Ime: ".$row['ime']."</h5>";
    echo "</div>";
    echo "</div>";

    echo "<div class='stran'>";
    echo '<div class="narocilo">';
    echo "<h5> Priimek: ".$row['priimek']."</h5>";
    echo "</div>";
    echo "</div>";

    echo "<div class='stran'>";
    echo '<div class="narocilo">';
    echo "<h5> Telefonska številka: ".$row['telefonska_stevilka']."</h5>";
    echo "</div>";
    echo "</div>";

    echo "<div class='stran'>";
    echo '<div class="narocilo">';
    echo "<h5> Naslov: ".$row['naslov']."</h5>";
    echo "</div>";
    echo "</div>";

    echo "<div class='stran'>";
    echo '<div class="narocilo">';
    echo "<h5> Kraj: ".$row['kraj']."</h5>";
    echo "</div>";
    echo "</div>";

    echo "<div class='stran'>";
    echo '<div class="narocilo">';
    echo "<h5> Elektronska pošta: ".$row['elektronska_posta']."</h5>";
    echo "</div>";
    echo "</div>";
    
    ?>

</body>
</html>