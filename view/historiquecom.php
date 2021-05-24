<?php
session_start();
ob_start(); 
 include '../model/database.php'; global $db;
?>
<html>
<head>
<title>HistoriqueCommandes</title>
<body
    background="../content/img/blue.jpg"></bodybackground>
    <link rel="stylesheet" href="../content/css/admin1.css" />
    <link rel="stylesheet" href="../content/css/style.css" />

</head>
<body>

<?php  $mo= $_SESSION['id']; ?>
<!-- si la session est activée-->
<?php if (isset($_SESSION['pseudo'])) { ?>
    <form action="../model/deconnexion.php">
        <input type="submit" name="envoi" class="subdeco" value="Déconnexion" /> 
        </form> <?php }  ?>

        <div class='text7'><h1>Historique des commandes</h1></br></div>
<table>
   <tr>
        <th>Quantité</th>
       <th>Date</th>
       <th>Heure</th>
       <th>Nom de l'article</th>
   </tr>
<?php
$c= $db ->query("SELECT * FROM commande_hist WHERE id_utilisateurs='$mo'"); //executer la requete
while ($donnees = $c->fetch())
{
?>
<p><!-- afficher les données -->
    <tr>
    <td><?php echo $donnees['quantité']; ?></td>
       <td><?php echo $donnees['date']; ?></td> 
       <td><?php echo $donnees['heure']; ?></td>   
        <td><?php 
$var=$donnees['id_articles'];
$q= $db ->query("SELECT * FROM articles WHERE id='$var'");
if ($donnees = $q->fetch())
{ echo $donnees['name']; }
?></td>
       
    </tr>
</p>


<?php } ?>
</table>

</bodyY>
</html>
