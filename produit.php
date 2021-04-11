<?php ob_start(); ?>
<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<link rel="stylesheet" href="styleaymane.css" />

<p> Bienvenue: <?=$_SESSION['pseudo']; ?> </p>
<p> Votre mail : <?=$_SESSION['email']; ?> </p>

<div class="label1">
<h1>les produits </h1>
</div>

<?php include 'database.php'; global $db;?>

<?php
//print_r($_GET);
if(isset($_GET["current_value"]))
{
if(isset($_GET["valinc"]))
{
$current_value=$_GET["current_value"]+1;
}else{
$current_value=$_GET["current_value"]-1;
}
}else{
$current_value=0;
}
?>

<p>Cette boîte utilisera des transitions pour width, height, background-color, transform.
   Survolez cette boîte pour voir l'effet.</p>


<form name="form1" method="get">
    <div class="label">
    <input type="text" id="name" name="current_value" value="<?php echo $current_value; ?>"/>
    </div>

<?php
$q= $db ->query("SELECT * FROM produits");

while ($donnees = $q->fetch())
{
?>

<p>
    <strong>La moto</strong> : <?php echo $donnees['titre']; ?><br />
    La marque : <?php echo $donnees['marque']; ?>, voici la photo echo <div class="box"><img src="<?php echo $donnees['image'];?>"></div> <br />
    le prix est de : <?php echo $donnees['prix']; ?>euros ! <br />la description <?php echo $donnees['description']; ?><br />

    <form name="form1" method="get">
    <input type="submit" name="valinc" value="ajoutez le produit">
    <input type="submit" name="valdec" value="enlever le produit">
    </form>

    <?php echo "-------------------------------------------------------------------------"; ?>
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

<?php
    if(isset($_POST['valinc'])){
        extract($_POST);
        $q= $db ->query("SELECT * FROM produits where titre='moto1'");

        while ($donnees = $q->fetch())
{
    ?>

<p>
    <strong>La moto</strong> : <?php echo $donnees['titre']; ?><br />
    La marque : <?php echo $donnees['marque']; ?>, voici la photo echo <img src="<?php echo $donnees['image'];?>">  <br />
    le prix est de : <?php echo $donnees['prix']; ?>euros ! <br />la description <?php echo $donnees['description']; ?><br />
</p>
<?php echo "vous avez choisi cette moto !"; ?>

<form method="post">

</form>




<?php
}
}
$q->closeCursor();
?>
</body>
</html>