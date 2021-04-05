<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Le panier </h1>

<?php include 'database.php';
            global $db;?>





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



<form name="form1" method="get">
    <input type="submit" name="valinc" value="ajoutez le produit">
    <input type="submit" name="valdec" value="enlever le produit">
    <input type="text" name="current_value" value="<?php echo $current_value; ?>"/>
</form>



<?php
   /*
       $q= $db ->prepare("INSERT INTO produits(titre,marque) VALUES(:titre, :marque)");
            $q ->execute([
        'titre' => 'moto2',
        'marque' => 'piwi'
            ]);

		
		if(isset($_POST['fronsend'])){
			extract($_POST);
			$q= $db ->prepare("DELETE From produits WHERE id>=2");	
			$q ->execute();
			echo "le compte a été crée";}
        else{
            echo "un email existe déjà";
        }*/
		
		
?>




</body>
</html>