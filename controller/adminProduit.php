<?php
session_start();
ob_start(); 
 include '../model/database.php'; global $db;
?>

<HTML>
<HEAD>
<TITLE>Produits</TITLE>
<body
    background="../content/img/blue.jpg"></bodybackground>
  
    <link rel="stylesheet" href="../content/css/admin1.css" />

</HEAD>
<BODY>
<!--menu de la page avec 3 boutons -->
<div class='text7'><h1>Les produits</h1></br></div>
<div class="lal">
    <div class="riw">
        <div class="col-md-offset-5 col-md-4 text-center">
            <div class="form"></br></br>
                <form action="adminUtilisateurs.php">
                    <input type="submit" name="envoi" class="utilbuttn1" value="Les utilisateurs" /> 
                </form>
                <form action="adminProduit.php">
                    <input type="submit" name="envoi" class="prodbuttn1" value="Les produits" /> 
                </form>
                <form action="../model/deconnexion.php">
                    <input type="submit" name="envoi" class="decobuttn1" value="Déconnexion" /> 
                </form>
            </div>
        </div>
    </div></br></br></br>    
</div>

<form action="nouveauProduit.php">
    <input type="submit" name="envoi" class="utilbuttn2" value="Ajouter un produit" /> 
    

<table>
   <tr>
       <th>Nom</th>
       <th>Type</th>
       <th>Marque</th>
       <th>Prix</th>
       <th>Consomation</th>
       <th>Details</th>
       <th>Image</th>
       <th>Suppression</th>
       <th>Modification</th> 
   </tr>
<?php
//requete pour acceder à la table articles
$q= $db ->query("SELECT * FROM articles");

while ($donnees = $q->fetch())
{
?>
<p><!-- afficher les données -->
    <tr>
       <td><?php echo $donnees['name']; ?></td>
       <td><?php echo $donnees['type']; ?></td>
       <td><?php echo $donnees['marque']; ?></td>
       <td><?php echo $donnees['prix']; ?></td>
       <td><?php echo $donnees['consomation']; ?></td>
       <td><?php echo $donnees['details']; ?></td>
       <td><?php echo $donnees['image']; ?></td>
        <form method="get" action="adminProduit.php" >
            <td><input type="submit" name="supprimer" class="supp" value="<?php echo $donnees["id"]; ?>" /> </td> </form>
        <form method="get" action="modifProduit.php">
            <td><input type="submit" name="modif" class="ajout" value="<?php echo $donnees["id"]; ?>" /> </td></form>
   </tr>
</p>

<?php
}
$q->closeCursor();
?>
<!--requete pour supprimer -->
<?php
if(isset($_GET['supprimer'])){
    extract($_GET);
    $var =isset($_GET["supprimer"]) ? $_GET["supprimer"]: NULL;
$q= $db ->query("DELETE FROM articles where id='$var'");
echo "Le produit a bien été supprimé !"; 
header('Location: adminProduit.php');

} 
ob_end_flush();
?>

</table>

</BODY>
</HTML>
