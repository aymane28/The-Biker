<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Acceuil</title> 
    </head> <body>
    <body
    background="/img/blue.jpg"></bodybackground>
    <link rel="stylesheet" href="/css/styke.css" />
<link rel="stylesheet" href="/css/styne.css" />
<link rel="stylesheet" href="/css/styje.css" />


<?php

include("header.php");
?>
   <?php if (isset($_SESSION['pseudo'])) { ?>
    <form action="deconnexion.php">
    <input type="submit" name="envoi" class="sub1" value="Déconnexion" /> </form> <?php }  ?>

<!-- Le corps -->
<section class="hero grid3">
  <h2>The Biker</h2></br></br></br></br>
  <h1>Venez découvrir notre site de vente de moto</h1>
  <p>Nous vous proposons différentes marques de moto.</p>
  
  <a href="" class="button normal green"></a>
</section>

    <img class="img1" src="https://so-sport.fr/wp-content/uploads/2018/08/course-moto-route.jpg">
    <img class="img2" src="https://dkzqmqjr9uy7w.cloudfront.net/dfb30247-ba31-4b0f-a718-340bec332ceb/assets/e0cf3b55-ee2c-46ec-8b96-3e1e2bee7271.jpg" >
    <img class="img1" src="https://so-sport.fr/wp-content/uploads/2018/08/course-moto-route.jpg">
</br></br></br></br>
   
<?php

include("footer.php");
?>


<?php include 'data/database.php';  global $db;?>

</body>
</html>