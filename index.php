<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
  } 
require_once("model/dbcontroller.php");
$db_handle = new DBController();?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Accueil</title> 
</head> <body>
<body
background="/content/img/blue.jpg"></bodybackground>
<link rel="stylesheet" href="content/css/style.css" />

<?php include 'model/database.php';  global $db;?>
<?php include("view/header.php"); ?>

<?php if (isset($_SESSION['pseudo'])) { ?>
    <form action="../model/deconnexion.php">
        <input type="submit" name="envoi" class="sub1" value="Déconnexion" /> 
    </form> <?php }  ?>

<!-- Le corps -->
<section class="hero grid3">

    <h2>The Biker</h2></br></br></br></br>
    <!--<h1>Venez découvrir notre site de vente de moto</h1>
    <p>Nous vous proposons différentes marques de moto.</p>-->
    <a href="" class="button normal green"></a>
</section>


    <div class="des">
    <img class="img1" src="content/img/motoacc1.jpg">
  
    <p class="ecr1"> Qui sommes-nous ? </br></br>
The Biker est le spécialiste de la vente des motos.
Leader sur ce créneau depuis 2019, The Biker est le premier-né des réseaux de ventes de différents marques de motos en France. 

Aujourd’hui, avec le développement de ses nouvelles enseignes The Biker, le réseau compte plus de 10 magasins : il y en a forcément un près de chez vous !
Nos experts sont à votre écoute pour des conseils personnalisés, n’hésitez pas à faire appel à eux !
</p>    </div>

<div class="lis">
<img class="liv" src="content/img/liv.JPG" > 
<img class="liv" src="content/img/pri.JPG" >
<img class="liv" src="content/img/avis.JPG" >
<img class="liv" src="content/img/rap.JPG" ></div>

    <img class="img2" src="content/img/motoacc2.jpg" >
    <img class="img1" src="content/img/motoacc3.jpg">
</br></br></br></br>
   
<?php include("view/footer.php"); ?>

</body>
</html>