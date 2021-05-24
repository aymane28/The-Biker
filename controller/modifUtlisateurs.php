<?php
session_start();
 include '../model/database.php'; global $db;
?>

<HTML>
<HEAD>
<TITLE>ModifUtlisateurs</TITLE>
<body
    background="../content/img/blue.jpg"></bodybackground>
<link rel="stylesheet" href="../content/css/admin1.css" />
</HEAD>
<BODY>
<div class='text7'><h1>Apporter des modification à l'utilisateur</h1></br></div>

<!-- menu de la partie admin avec 3 boutons -->
<div class="lal">
    <div class="riw">
        <div class="col-md-offset-5 col-md-4 text-center">
            <div class="form"></br></br>
                <form action="adminUtilisateurs.php">
                    <input type="submit" name="envoi" class="utilbuttn1" value="Les utilisateurs" /> 
                </form>
                <form action="/adminProduit.php">
                    <input type="submit" name="envoi" class="prodbuttn1" value="Les produits" /> 
                </form>
                <form action="../model/deconnexion.php">
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
       <th>Email</th>
       <th>Type</th>
       <th>Modifier</th>
   </tr>
 
<?php
$q= $db ->query("SELECT * FROM utilisateurs where id='$val'");
if ($donnees = $q->fetch())
{
?>
<p>
    <tr>
        <form method="get" >
            <td><input type="text" name="newname" value="<?php echo $donnees['pseudo']?>"  maxlength="15" size="11"></td>
            <td><input type="text"  name="newemail" value="<?php echo $donnees['email']?>"  maxlength="20" size="21"></td>
            <td><input type="text" name="newtype" value="<?php echo $donnees['type']?>"  maxlength="12" size="10"></td>
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
    
$q= $db ->prepare("UPDATE utilisateurs SET pseudo = '".$_GET["newname"]."',
                    email = '".$_GET["newemail"]."',
                    type = '".$_GET["newtype"]."'
                     WHERE id = '".$_GET["modifier"]."'");
$q ->execute();
?>
<div class='reponse'><h1>L'utilisateur a été modifié!</h1></div>
<?php   
} 
$q->closeCursor();
?>

</BODY>
</HTML>