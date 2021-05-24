<?php
session_start();
require_once("../model/dbcontroller.php");
$db_handle = new DBController();
?>

<HTML>
<HEAD>
<TITLE>Produits</TITLE>
<link href="../content/css/style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<body
    background="../content/img/blue.jpg"></bodybackground>
	<?php
include("header.php");?>

<?php if (isset($_SESSION['pseudo'])) { ?>
    <form action="../model/deconnexion.php">
    	<input type="submit" name="envoi" class="sub1" value="Déconnexion" /> </form> <?php }  ?>
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
									<form method="post" action="../controller/panier.php?action=add&name=<?php echo $product_array[$key]["name"]; ?>">
										<div class="product-image"><img class="imgg" src="<?php echo $product_array[$key]["image"]; ?>"></div>
											<div class="product-tile-footer"></div>
												<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" name="pan" value="Ajouter au panier" class="btnAddAction" /></div>
												
												<div class="product-prix"><?php echo $product_array[$key]["prix"]." €"; ?></div>
									</form>
										</form>
									<form method="get" action="produitDetails.php">
										<input type="submit" name="moto" value="<?php echo $product_array[$key]["name"]; ?> " class="btnArticle" /> 
			 								 <div class="appdetail"> 
			 									 <p> Appuyer pour plus de détail </p></div>
      								</form>
							</div>
					<?php
						}
					}
				?>	
			</div>


			<?php include '../model/database.php'; global $db;?>

			<?php
		
/*
		if(isset($_POST['pan'])){
		extract($_POST);
		$q= $db ->prepare("INSERT INTO commande_hist(id_utilisateurs,name) VALUES('".$_SESSION['id']."','lolo')");
		$q ->execute([]); 
		echo "le produit est ajouté";
			
	}
			else{
				echo "le produit n'es pas ajouté";
			}	*/
		?>



<?php include("footer.php"); ?>
</BODY>
</HTML>