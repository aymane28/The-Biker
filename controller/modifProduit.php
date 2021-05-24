<?php
session_start();
 include '../model/database.php'; global $db;
?>

<HTML>
<HEAD>
<TITLE>ProduitDetails</TITLE>
<body
    background="../content/img/blue.jpg"></bodybackground>
<link rel="stylesheet" href="../content/css/admin1.css" />
</HEAD>
<BODY>
<div class='text7'><h1>Apporter des modification au produit</h1></br></div>


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
                <form action="../admin/deconnexion.php">
                    <input type="submit" name="envoi" class="decobuttn1" value="Déconnexion" /> 
                </form>
            </div>
        </div>
    </div></br></br></br>    
</div>

<?php $val =isset($_GET["modif"]) ? $_GET["modif"]: NULL; ?>    

<table>
   <tr>
       <th>Name</th>
       <th>Type</th>
       <th>Marque</th>
       <th>Prix</th>
       <th>Consomation</th>
       <th>Details</th>
       <th>Image</th>
       <th>Modifier</th>
   </tr>

<?php
$q= $db ->query("SELECT * FROM articles where id='$val'");
if ($donnees = $q->fetch())
{
?>
<p>
    <tr>
       <form method="get" action="modifProduit.php">
            <td><input type="text" name="newname" value="<?php echo $donnees['name']; ?>"  maxlength="15" size="10"></td>
            <td><input type="text"  name="newtype" value="<?php echo $donnees['type']; ?>"  maxlength="12" size="9"></td>
            <td><input type="text" name="newmarque" value="<?php echo $donnees['marque']; ?>"  maxlength="12" size="9"></td>
            <td><input type="number" name="newprix" value="<?php echo $donnees['prix']; ?>"   maxlength="10000000" size="5"></td>
            <td><input type="number" name="newconsomation" value="<?php echo $donnees['consomation']; ?>"  min="1" max="50" size="4"></td>
            <td><input type="textarea" name="newdetails" class="case" value="<?php echo $donnees['details']; ?>"  maxlength="48000" > </div></td>
            <td><input type="text" name="newimage" value="<?php echo $donnees['image']; ?>"  maxlength="20" size="16"></td>
            <td><input type="submit" name="modifier" class="ajout3" value="<?php echo $donnees['id']; ?>"></td>
       </form>
   </tr>
</p>

<?php
}
$q->closeCursor();
?>
</br></br></br>
</table>

<?php
if(isset($_GET['modifier'])){
    extract($_GET);  
$q= $db ->prepare("UPDATE articles SET name = '".$_GET["newname"]."',
                    type = '".$_GET["newtype"]."',
                    marque = '".$_GET["newmarque"]."',
                    prix = '".$_GET["newprix"]."',
                    consomation = '".$_GET["newconsomation"]."',
                    details = '".$_GET["newdetails"]."',
                    image = '".$_GET["newimage"]."'
                     WHERE id = '".$_GET["modifier"]."'");
$q ->execute();
?>
<div class='reponse'><h1>Le produit a été modifié!</h1></div>
<?php   
} 
$q->closeCursor();
?>

</BODY>
</HTML>