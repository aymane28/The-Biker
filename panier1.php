<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <body>
		<body
    background="/img/blue.jpg"></bodybackground>
    <link rel="stylesheet" href="/css/stype.css" />
            <link rel="stylesheet" href="jesuis.css" />
            <link rel="stylesheet" href="/css/styde.css" />
		
			<?php include 'data/database.php'; global $db;?>			
<?php
include("header.php");?>



<?php

$q = $db -> query("SELECT * FROM articles");

while ($donnees = $q->fetch())
{
$valeur_test= $donnees['prix'];
}

?>






<?php
$q= $db ->query("SELECT * FROM articles");

while ($donnees = $q->fetch())
{
?>


<div class="containerrr">	
		<section class="dr-container" id="dr-container">
			<article>
            <div class="cont">
					<h3><a target="_blank" href="http://"><?php echo $donnees['nom']; ?></a></h3>
						<span>...</span>
            </div>
					 <img class="imgg" src="<?php echo $donnees['image'];?>">
                     <input type="text" name="current_value"class="form-controle input-sm chat-input" value="<?php echo $donnees['prix'] ?>"/>
                     <input type="submit" href="panier.php" name="valinc" class="btn-danger1" value="Ajoutez le produit">
                     <div class="cont2">
						<span>...</span>
                        </div>
                        
				</article>  
				</div> 
			</section>
            
       
		<?php
        
}
?>


    </body>
</html>