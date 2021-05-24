<?php
session_start();
ob_start(); 
 include '../model/database.php'; global $db;
?>
<html>
<head>
<title>utilisateurs</title>
<body
    background="../content/img/blue.jpg"></bodybackground>
    <link rel="stylesheet" href="../content/css/admin1.css" />

</head>
<body>
<div class='text7'><h1>Les utilisateurs</h1></br></div>

<!--menu de la page avec 3 boutons -->
<div class="lal">
    <div class="riw">
        <div class="col-md-offset-5 col-md-4 text-center">
            <div class="form"></br></br>
                <form action="adminUtilisateurs.php">
                    <input type="submit" name="envoi" class="utilbuttn1" value="Les utilisateurs" /> 
                </form>
                <form action="/controller/adminProduit.php">
                    <input type="submit" name="envoi" class="prodbuttn1" value="Les produits" /> 
                </form>
                <form action="../model/deconnexion.php">
                    <input type="submit" name="envoi" class="decobuttn1" value="Déconnexion" /> 
                </form>
             </div>
        </div>
    </div></br></br></br>    
</div>


<form action="nouveauUtilisateur.php">
        <input type="submit" name="envoi" class="utilbuttn2" value="Ajouter un utilisateur" /> 
   </form> 
<table>
   <tr>
        <th>Id</th>
       <th>Nom</th>
       <th>Email</th>
       <th>Type</th>
       <th>Suppression</th>
       <th>Modification</th>
       <th>Historique des commandes</th>
   </tr>
<?php
$q= $db ->query("SELECT * FROM utilisateurs");
while ($donnees = $q->fetch())
{
?>
<p> <!-- Affichage des données -->
    <tr>
        <td><?php echo $donnees['id']; ?></td>
       <td><?php echo $donnees['pseudo']; ?></td>
       <td><?php echo $donnees['email']; ?></td> 
       <td><?php echo $donnees['type']; ?></td> 
       <form method="get" >
            <td><input type="submit" name="supp" class="supp" value="<?php echo $donnees["id"]; ?>" /> </td> </form>
            <form method="get" action="modifUtlisateurs.php">
            <td><input type="submit" name="modif" class="ajout" value="<?php echo $donnees["id"]; ?>" /> </td>
        </form>
        <form method="get" action="adminHistorique.php">
            <td><input type="submit" name="admhist" class="admhist" value="<?php echo $donnees["id"]; ?>" /> </td>
        </form>
    </tr>
</p>
<?php
}
$q->closeCursor();
?>


<!--requete pour supprimer -->
<?php
if(isset($_GET['supp'])){
    extract($_GET);
    $var =isset($_GET["supp"]) ? $_GET["supp"]: NULL;
$q= $db ->query("DELETE FROM utilisateurs where id='$var'");
$c= $db ->query("DELETE FROM carte where id_utilisateurs='$var'");
    echo "L'utilisateur a bien été supprimé !";
    header ('Location: adminUtilisateurs.php');
}
ob_end_flush();
?>
</table>
</bodyY>
</html>
