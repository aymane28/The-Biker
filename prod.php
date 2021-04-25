<?php ob_start(); ?>
<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<link rel="stylesheet" href="styse.css" />

<p> Bienvenue: <?=$_SESSION['pseudo']; ?> </p>
<p> Votre mail : <?=$_SESSION['email']; ?> </p>


<pre>les produits </pre>


<?php include 'data/database.php'; global $db;?>

<?php
$q= $db ->query("SELECT * FROM articles");

while ($donnees = $q->fetch())
{
?>


<p>
<div class="container1">
<ul type="square">
   <li> La moto : <?php echo $donnees['nom']; ?><br /></li>
   </li> <div class="box"><img src="<?php echo $donnees['image'];?>"></div> <br /> </li>
   <li> Le type : <?php echo $donnees['type']; ?> </li>
   </li> La marque : <?php echo $donnees['marque']; ?> </li>
   </li> le prix est de : <?php echo $donnees['prix']; ?>euros ! <br /> </li>
   </li> la consomation <?php echo $donnees['consomation']; ?><br /></li>
   </li> la description <?php echo $donnees['details']; ?><br /> </li>


    <form name="form1" method="get">
    <input type="submit" name="valinc" value="ajoutez le produit">
    <input type="submit" name="valdec" value="enlever le produit">
    </form>

    <?php echo "-------------------------------------------------------------------------"; ?>
</ul>
</div>
</p>



<?php
}
$q->closeCursor();
?>

<form method="post">
<input type="submit" name="change" value="Modifications des informations">
<input type="submit" name="payer" value="payer">
</form>

<?php
if(isset($_POST['change']))
{
    extract($_POST);
    header('Location: modifications.php');
    exit;
    
}  

if(isset($_POST['payer'])){
    extract($_POST);
    header("Location: carte.php");
    exit();}
    ob_end_flush();
                ?>


</body>
</html>