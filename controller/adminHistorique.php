<?php
session_start();
ob_start(); 
 include '../model/database.php'; global $db;
?>
<html>
<head>
<title>Historique des commandes</title>
<body
    background="../content/img/blue.jpg"></bodybackground>
    <link rel="stylesheet" href="../content/css/admin1.css" />

</head>
<body>
<div class='text7'><h1>Historique des commandes de l'utilisateur</h1></br></div>

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

<!-- déclarer la variable-->
<?php $val =isset($_GET["admhist"]) ? $_GET["admhist"]: NULL; ?>    

<table>
   <tr>
   <th>Quantité</th>
       <th>Date</th>
       <th>Heure</th>
       <th>Nom de l'article</th>
   </tr>
   <?php
$c= $db ->query("SELECT * FROM commande_hist WHERE id_utilisateurs='$val'");// requete pour acceder à la table commande_hist
while ($donnees = $c->fetch())
{
?>
<p><!-- afficher les articles -->
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
</br></br></br>
</table>


</table>
</bodyY>
</html>
