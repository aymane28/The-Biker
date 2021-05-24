<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Payement</title>
</head>
<body2>

<link rel="stylesheet" href="../content/css/style.css" />
<body
    background="../content/img/blue.jpg"></bodybackground>
</body>

<div id="product-grid">
	<div class="txt-heading">Payement</div>
		<div class="popp1"><h1> Payement </h1></div>
			<div class="card-payement">
				<div class="contu">
					<div class="card-title"><p> Bienvenue : <?php echo $_SESSION['pseudo'] ?><p></div>			
            	</div>
					<form method="post" action="acceptpayement.php">
            			<img class="imgg7" src="../content/img/payement_card.png"></div>
							<div class="product-tile-footer2"></div>
								<div class="product2-conso"></div>
									<div class="product2-details"></div>
										<div class="payement-total"><p> Merci pour votre achat ! </br></br>
                 							Le montant est de: <?php echo $_SESSION['total']." €" ?> </p></div>
                 							<input type="submit" value="Valider le payement" class="btnpayer" />
					</form>
		</div>
</div>



<?php
 foreach ($_SESSION["cart_item"] as $item){
	$item_prix = $item["quantity"]*$item["prix"];
	$item["id"];
	//$_SESSION['name'] =$item["name"];
	require_once("../model/database.php");
	if(isset($_GET['envoii'])){
		extract($_GET);
		$date1 = date('d-m-y');
		$date2 = date('h:i:s');
				$q= $db ->prepare("INSERT INTO commande_hist(id_utilisateurs,id_articles,quantité,date, heure) VALUES('".$_SESSION['id']."','".$item["id"]."', '".$item["quantity"]."','$date1', '$date2')");
				$q ->execute(); 
		 
		}
	}

?>
</html>