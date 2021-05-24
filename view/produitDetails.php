<?php
session_start();
require_once("../model/dbcontroller.php");
$db_handle = new DBController();?>

<HTML>
<HEAD>
<TITLE>ProduitDetails</TITLE>
<link rel="stylesheet" href="../content/css/style.css" /> 
</HEAD>
<BODY>
<body
     background="../content/img/blue.jpg"></bodybackground>
	
<?php include("header.php"); ?>

<!-- si la session est activée-->
<?php if (isset($_SESSION['pseudo'])) { ?>
    <form action="../model/deconnexion.php">
    	<input type="submit" name="envoi" class="sub1" value="Déconnexion" /></form> <?php }  ?>
			<div id="product-grid">
				<div class="txt-heading">Produits</div>
					<div class="txt-heading1"><?php echo $_GET["moto"]; ?></div>
						<?php
						$product_array = $db_handle->runQuery("SELECT * FROM articles where name='" . $_GET["moto"] . "' ORDER BY id ASC");
						if (!empty($product_array)) { 
							foreach($product_array as $key=>$value){
							?>
							<div class="product2-item">
								<div class="contu">
									<div class="product2-title"><?php echo $product_array[$key]["marque"]; ?></div>		
								</div>
									<form method="post" action="../controller/panier.php?action=add&name=<?php echo $product_array[$key]["name"]; ?>">
										<div class="product2-image"><img class="imgg3" src="<?php echo $product_array[$key]["image"]; ?>"></div>
											<div class="product-tile-footer2"></div>
												<div class="product2-conso"><?php echo "Consomation : ". $product_array[$key]["consomation"]." litres/100 kilomètres"; ?></div>
													<div class="product2-details"><?php echo $product_array[$key]["details"]; ?></div>
														<div class="cart2-action"><input type="text" class="product2-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Ajouter au panier" class="btn2AddAction" /></div>
															<div class="product2-prix"><?php echo $product_array[$key]["prix"]." €"; ?></div>
									</form>
							</div>
							<?php
						}
					} 			?>
			</div>

<?php include("footer.php"); ?>

</BODY>
</HTML>




