<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();?>



<HTML>
<HEAD>
<TITLE>Produits</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="/css/stype.css" />
<link rel="stylesheet" href="/css/styme.css" />
<link rel="stylesheet" href="/css/style.css" />
</HEAD>
<BODY>
<body
    background="/img/blue.jpg"></bodybackground>
	<?php
include("header.php");?>

<div id="product-grid">
	<div class="txt-heading">Produits</div>
	<div class="txt-heading1"><?php echo $_GET["test"]; ?></div>
	<?php
	
	$product_array = $db_handle->runQuery("SELECT * FROM articles where type='" . $_GET["test"] . "' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
		<div class="cont">
		<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
						<span>...</span>
            </div>
			<form method="post" action="produits.php?action=add&name=<?php echo $product_array[$key]["name"]; ?>">
			<div class="product-image"><img class="imgg" src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<a href="Ensavoirplus.php" class="ensavoirplus"> <h4> En savoir plus sur le produit</h4></a>  			</div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Ajouter au panier" class="btnAddAction" /></div>
			<div class="product-prix"><?php echo $product_array[$key]["prix"]." €"; ?></div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>

<?php

include("footer.php");
?>
</BODY>
</HTML>