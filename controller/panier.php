<?php
session_start();
require_once("../model/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByname = $db_handle->runQuery("SELECT * FROM articles WHERE name='" . $_GET["name"] . "'");
			$itemArray = array($productByname[0]["name"]=>array('id'=>$productByname[0]["id"], 'name'=>$productByname[0]["name"], 'type'=>$productByname[0]["type"], 'quantity'=>$_POST["quantity"], 'prix'=>$productByname[0]["prix"], 'image'=>$productByname[0]["image"]));
			
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
<TITLE>Panier</TITLE>
</HEAD>

<BODY>
<body
    background="../content/img/blue.jpg"></bodybackground>
	<link rel="stylesheet" href="../content/css/style.css" />
	<?php include("../view/header.php");?>

   	<?php if (isset($_SESSION['pseudo'])) { ?>
    <form action="../model/deconnexion.php">
    <input type="submit" name="envoi" class="sub1" value="Déconnexion" /> </form> 
	 <?php }  ?>
<div id="shopping-cart">
<div class="txt-heading">Panier</div>


<a id="btnEmpty" href="panier.php?action=empty">Vider le panier</a>
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
				<td  style="text-align:right;"><?php echo $item_prix." €"; ?></td>
				<td style="text-align:center;"><a href="panier.php?action=remove&name=<?php echo $item["name"]; ?>" class="btnRemoveAction"><img src="../content/img/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_prix += ($item["prix"]*$item["quantity"]);

		}
		
		?>

<?php
		
		
			if(isset($_GET['envoii'])){
				$date1 = date('d-m-y');
		$date2 = date('h:i:s');
				extract($_GET);
				//$q= $db ->prepare("INSERT INTO commande_hist(id_utilisateurs,id_acrticles,quantité,date, heure) VALUES('".$_SESSION['id']."','".$item["id"]."', '".$item["quantity"]."', :date, $date2)");
				//$q ->execute(); 
				$c= $db ->prepare("INSERT INTO commande_hist(date, heure) VALUES('aymane', 'aymane')");
				$c ->execute(); 
								
			}	
				?>


<form action="panier.php" method="get" >
	<div class="hidden">
	<input name ="price" value="<?php echo $total_prix." €" ?>">
	<input name ="quantité" value="<?php echo $total_quantity; ?>">
	<input name ="image" value="<?php echo $item["image"];  ?>">
	<input name ="name" value="<?php echo $item["name"];  ?>">
	</div>
</form>

<img type="submit" class="imge" src="../content/img/panier.png"/>

<?php include '../model/database.php'; global $db;?>
<?php 

?>
<?php if (isset($_SESSION['pseudo'])) { 
	 $r = $db ->query("SELECT * FROM carte where id_utilisateurs ='".$_SESSION['id']."'");
	 $r ->execute();
	 $result2 = $r->rowCount();
	if($result2==1){?>
    <form action="../view/payement.php" method="get">
	<input type="submit" name="envoii" class="payer" value="Payer" /> </form>
<?php } else{
  ?> <a href="carte.php"> <input type="submit" name="envoi" class="payer" value="Renseignez votre carte pour payer" /></a>
<?php } }else{ ?>
	  <a href="connexion.php"> <input type="submit" name="envoi" class="payer" value="Se connecter pour accéder au payement" /></a>
<?php	}?>

<?php $_SESSION['total']=$total_prix; ?>



<?php /*	
    $var =isset($_POST["rem"]) ? $_POST["rem"]: NULL;
		if(isset($_POST['rem'])){
		extract($_POST);
		$q= $db ->prepare("DELETE FROM commande_hist WHERE name='$var' AND id_utilisateurs='".$_SESSION['id']."'"  );
		$q ->execute([]); 
		echo "le produit est supprimé";	
	
	}
			else{
				echo "le produit n'es pas supprimé";
			}	*/
		?>


<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo $total_prix." €"; ?></strong></td>
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

<?php include("../view/footer.php"); ?>
</BODY>
</html>