<?php
session_start();
 include '../model/database.php'; global $db;
?>

<HTML>
<HEAD>
<TITLE>NouveauProduit</TITLE>
<body
    background="../content/img/blue.jpg"></bodybackground>
<link rel="stylesheet" href="../content/css/admin1.css" />
</HEAD>
<BODY>
<div class='text7'><h1>Ajouter un nouveau produit</h1></br></div>

<!--menu de la page avec 3 boutons -->
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

<table> 
   <tr> 
       <th>Name</th>
       <th>Type</th>
       <th>Marque</th>
       <th>Prix</th>
       <th>Consomation</th>
       <th>Details</th>
       <th>Image</th>
       <th>Ajouter</th>
   </tr>
       <form method="get" >
            <td><input type="text" name="newname" value=""  maxlength="15" size="9"></td>
            <td><input type="text"  name="newtype"  maxlength="12" size="9"></td>
            <td><input type="text" name="newmarque"  maxlength="12" size="9"></td>
            <td><input type="number" name="newprix"   min="1" max="10000000" size="4"></td>
            <td><input type="number" name="newconsomation"   min="1" max="50" size="3"></td>
            <td><input type="textarea" name="newdetails" class="case"  maxlength="48000" > </div></td>
            <td> <input type="file" name="newimage" accept="image/png, image/jpeg" size="8"> </td>
            <td><input type="submit" name="ajouter" class="ajout2" value="Ajouter" /> </td>
        </form>
   </tr>
    </p>
    </br></br></br>
</table>
<!-- quand on clique sur le bouton ajouter on exucute la requete -->
<?php
if(isset($_GET['ajouter'])){
    extract($_GET);
    $q= $db ->prepare("INSERT INTO articles (name, type, marque, prix, consomation, details, image) 
                    VALUES ('".$_GET["newname"]."',
                   '".$_GET["newtype"]."',
                    '".$_GET["newmarque"]."',
                   '".$_GET["newprix"]."',
                   '". $_GET["newconsomation"]."',
                    '".$_GET["newdetails"]."',
                   '".$_GET["newimage"]."')");       
    $q ->execute();
?>
    <div class='reponse'><h1>Le produit a été ajouté !</h1></div>
    <?php   
} 
?>

</BODY>
</HTML>