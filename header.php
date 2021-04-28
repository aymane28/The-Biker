
<!-- header -->

<header>
      <h1 id="logo"><a href="acceuil.php">The Biker</a></h1>
      <nav>
        <ul>
          <li class="active"><a href="acceuil.php">Acceuil</a></li>
          <li class="deroulant"><a href="">Articles </a>
            <ul class="sous">

        
          <?php
	$product_array = $db_handle->runQuery("SELECT DISTINCT type FROM articles ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>

  <form method="get" action="articlecat.php">
      <div class="list">
  <li><input type="submit" name="test" value="<?php echo $product_array[$key]["type"]; ?>" class="btnAdd4Action" /></li>
      </div>
      </form>
	<?php

		}}
	
	?>
  <!--
              <li><a href="articlecat.php">Tout-Terrain </a></li>	
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
           <li class="responsive2"><a href="pan.php">Panier</a> </li>

          <li><a href="connexion.php">Compte</a></li>
        </ul>

           <a href="pan.php"> <img class="img4" src="/img/panier.png"/></a>       
      </nav>
</header>

