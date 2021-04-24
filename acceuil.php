<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Acceuil</title> 
    </head> <body>
    <body
    background="/img/blue.jpg"></bodybackground>
    <link rel="stylesheet" href="/css/stype.css" />

<!-- header -->
<header>
      <h1 id="logo"><a href="">The biker</a></h1>
      <nav>
        <ul>
          <li class="active"><a href="">Acceuil</a></li>
          <li class="deroulant"><a href="">Articles </a>
            <ul class="sous">
              <li><a href="#">type 1</a></li>
              <li><a href="#">type 2</a></li>
              <li><a href="#">type 3</a></li>
              <li><a href="#">type 4</a></li>
              <li><a href="#">type 5</a></li>
             <li><a href="#">type 6</a></li>
            </ul>
          </li>
        </ul>
      </nav>

      <nav class="responsive2">
        <ul>
           <li class="responsive2"><a href="panier.php">Panier</a> </li>
          <li><a href="connexion.php">Compte</a></li>
        </ul>
           <a href="panier.php"> <img class="img4" src="/img/panier.png"/></a>       
      </nav>
</header>
   
<!-- Le corps -->
<section class="hero grid3">
  <h2>The Biker</h2>
  <h1>Venez découvrir notre site de vente de moto</h1>
  <p>Nous vous proposons différentes marques de moto.</p>
  <a href="" class="button normal green">Savoir plus</a>
</section>
    <img class="img1" src="https://so-sport.fr/wp-content/uploads/2018/08/course-moto-route.jpg">
    <img class="img2" src="https://dkzqmqjr9uy7w.cloudfront.net/dfb30247-ba31-4b0f-a718-340bec332ceb/assets/e0cf3b55-ee2c-46ec-8b96-3e1e2bee7271.jpg" >
    <img class="img1" src="https://so-sport.fr/wp-content/uploads/2018/08/course-moto-route.jpg">
</br></br></br></br>
   

<!-- footer -->  
<footer>
  <h4>The Biker</h4>
  <ul class="social">
    <li><a href=""><img src="https://i.imgur.com/xUT72NF.png" alt="" /></a></li>
    <li><a href=""><img src="https://i.imgur.com/yWRhsGj.png" alt="" /></a></li>
  </ul>
</footer>

<?php include 'data/database.php';  global $db;?>

</body>
</html>