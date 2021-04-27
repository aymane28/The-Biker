<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByname = $db_handle->runQuery("SELECT * FROM articles WHERE name='" . $_GET["name"] . "'");
			$itemArray = array($productByname[0]["name"]=>array('name'=>$productByname[0]["name"], 'type'=>$productByname[0]["type"], 'quantity'=>$_POST["quantity"], 'prix'=>$productByname[0]["prix"], 'image'=>$productByname[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByname[0]["name"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByname[0]["name"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["name"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>



<HTML>
<HEAD>
<TITLE>Produits</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="/css/stype.css" />
<link rel="stylesheet" href="/css/styne.css" />
<link rel="stylesheet" href="/css/style.css" />
</HEAD>
<BODY>
<body













<div id="product-grid">
	<div class="txt-heading">Produits</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM articles where marque='" . $_GET["name"] . "' ORDER BY id ASC");
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