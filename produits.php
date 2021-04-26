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
<link rel="stylesheet" href="/css/styme.css" />
<link rel="stylesheet" href="/css/style.css" />
</HEAD>
<BODY>
<body
    background="/img/blue.jpg"></bodybackground>
	<?php
include("header.php");?>
<div id="shopping-cart">
<div class="txt-heading">Panier</div>





<a id="btnEmpty" href="produits.php?action=empty">Vider le panier</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_prix = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Nom</th>
<th style="text-align:left;">Type</th>
<th style="text-align:right;" width="5%">Quantité</th>
<th style="text-align:right;" width="10%">Prix unitaire</th>
<th style="text-align:right;" width="10%">Prix</th>
<th style="text-align:center;" width="5%">Vider</th>
</tr>	




<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_prix = $item["quantity"]*$item["prix"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["type"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo $item["prix"]." €"; ?></td>
				<td  style="text-align:right;"><?php echo number_format($item_prix,2)." €"; ?></td>
				<td style="text-align:center;"><a href="produits.php?action=remove&type=<?php echo $item["type"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_prix += ($item["prix"]*$item["quantity"]);
		}
		?>

<form action="panier.php" method="get" >
	<div class="hidden">
	<input name ="price" value="<?php echo number_format($total_prix, 2) ?>">
	<input name ="quantité" value="<?php echo $total_quantity; ?>">
	<input name ="image" value="<?php echo $item["image"];  ?>">
	</div>
	<input type="submit" name="envoi" class="sub1" value="Vérifiez votre panier" />
</form>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo number_format($total_prix, 2)." €"; ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Votre panier est vide</div>
<?php 
}
?>
</div>






<div id="product-grid">
	<div class="txt-heading">Produits</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM articles ORDER BY id ASC");
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