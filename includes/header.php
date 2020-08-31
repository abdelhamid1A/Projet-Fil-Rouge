<?php

include('functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/1c47ec79f8.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Document</title>
</head>
<body>

    <!-- start nav  -->
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #111;color: #fff;">
  <a class="navbar-brand " href="index.php"><img src="img/WA.png" alt="" class="logo"></a>
  <button class="navbar-toggler navbar-dark "  type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" ></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="search.php?cat=voitur#">Voiture</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php?cat=moto">Moto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forum.php">Forum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vol.php">vol</a>
      </li>
     
      
         <?php
        
           
        //si le session de admin affiché ce lien       
            
         if ((isset($_SESSION['logadmin']) && $_SESSION['logadmin']==true)) {
          
           echo '<li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" ><i class="fa fa-users"></i> admin</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="admin.php">publicite</a>
           <a class="dropdown-item" href="logout.php">déconnecte</a>
           </div>
         </li>';
  
         }else{
         
            


        if ((isset($_SESSION['log']) && $_SESSION['log']=true)) { 
     echo  '<li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" ><i class="fa fa-user" ></i> profile</a>
        <div class="dropdown-menu  bg-dark" aria-labelledby="navbarDropdown">
        <a class="dropdown-item text-white bg-dark " href="setting.php">setteing</a>
        <a class="dropdown-item text-white bg-dark" href="logout.php">déconnecte</a>
        </div>
      </li>';
      }else{
        echo  '<li class="nav-item">
        <a class="nav-link" href="login.php" ><i class="fa fa-user-circle" ></i> se connect</a>
      </li>';
      }
      if ((isset($_SESSION['log']) && $_SESSION['log']=true)){ 
     echo '<li class="nav-item">
        <button class="btn btn-primary"><a class="nav-link" href="annonce.php">Déposer une annonce</a></button>
      </li>';
      }else{
        echo '<li class="nav-item">
        <button class="btn btn-primary"><a class="nav-link" href="login.php">Déposer une annonce</a></button>
      </li>';
      }
    }
      ?>
    </ul>
  </div>
</nav>
     <!-- end nav  -->