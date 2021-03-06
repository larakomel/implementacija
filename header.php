<?php
session_start();
?>

<!DOCTYPE html>

<html lang="sl-SI">
  <head>
    <link rel="stylesheet" type="text/css" href="sustyle.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8" name="viewport" content="width=device-width, user-scaleable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Home</title>

    <!--linki za bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <!--meni-->
    <nav class="navbar navbar-dark navbar-fixed-top" style="background-color: #2E4677;">
      <a class="navbar-brand" href="home.php">
    <img src="logo.png" alt="logo" style="width:70px;">
    </a>
  <button id="tog" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <?php
          if(isset($_SESSION["email"])){
              echo '<li class="nav-item">
              <a class="nav-link" id="navodila" style="color: white; font-size: 20px;" href="profile.php">My profile</a>
            </li>';
            echo '<li class="nav-item">
              <a class="nav-link" id="navodila" style="color: white; font-size: 20px;" href="includes/logout.inc.php">Log out</a>
            </li>';
          }else{
              echo '<li class="nav-item">
              <a class="nav-link" style="color: white; font-size: 20px;" href="login.php">Log In</a>
            </li>';
            echo '<li class="nav-item">
            <a class="nav-link" id="navodila" style="color: white; font-size: 20px;" href="signup.php">Sign up</a>
          </li>';
          }
        ?>
      
      
    </ul>
  </div>
</nav>
