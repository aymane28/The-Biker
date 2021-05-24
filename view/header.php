<!-- header -->
<header>
  <h1 id="logo"><a href="../index.php">The Biker</a></h1>
    <nav>
      <ul>
        <li class="active"><a href="../index.php">Accueil</a></li><!-- acceder à la page index-->
        <li class="deroulant"><a href="">Articles </a>
        <ul class="sous">
   
        <?php
  	       $product_array = $db_handle->runQuery("SELECT DISTINCT type FROM articles ORDER BY id ASC");
	          if (!empty($product_array)) { 
		          foreach($product_array as $key=>$value){
        ?><!-- afficheage des catégories -->
          <form method="get" action="/view/produits.php">
            <div class="list">
              <li><input type="submit" name="test" value="<?php echo $product_array[$key]["type"]; ?>" class="btnAdd4Action" /></li>
            </div>
          </form>
	        <?php
	      	    }
            }
          ?>
            <!--
              <li><a href="articlecat.php">Tout-Terr</a></li>	
              <li><a href="articlecat.php">Routière</a></li>
              <li><a href="articlecat.php">Roadster</a></li>
              <li><a href="articlecat.php">Sportive</a></li>
              <li><a href="articlecat.php">Cruiser</a></li>-->
            </ul>
        </li>
      </ul>
    </nav>
      <nav class="responsive2">
        <ul>
            <li class="responsive2"><a href="../controller/panier.php">Panier</a> </li> <!-- acceder au panier -->
            <li><a href="../controller/connexion.php">Compte</a></li> <!-- acceder au compte -->
        </ul>
          <a href="../controller/panier.php"> <img class="img4" src="../content/img/panier.png"/></a>  <!-- acceder au compte -->     
  </nav>
</header>

