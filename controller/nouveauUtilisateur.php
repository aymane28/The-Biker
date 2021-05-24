<?php
session_start();
 include '../model/database.php'; global $db;
?>

<HTML>
<HEAD>
<TITLE>NouveauUtilisateur</TITLE>
<body
    background="../content/img/blue.jpg"></bodybackground>
<link rel="stylesheet" href="../content/css/admin1.css" />
</HEAD>
<BODY>

<div class='text7'><h1>Ajouter un nouveau utilisateur</h1></br></div>

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
       <th>Email</th>
       <th>Mot de passe</th>
       <th>Type</th>
       <th>Ajouter</th>
   </tr>

       <form method="get" >
            <td><input type="text" name="newname" value=""  maxlength="15" size="11"></td>
            <td><input type="text"  name="newemail"  maxlength="20" size="21"></td>
            <td><input type="password"  name="newpassword"  maxlength="20" size="21"></td>
            <td> <select name="newtype" >
            <option value="">--Choisissez le role--</option>
            <option >user</option>
            <option >admin</option></td>
            </select>
            <!--<td><input type="text" name="newrole"  maxlength="12" size="10"></td>-->
            <td><input type="submit" name="ajout" class="ajout2" value="Ajouter" /> </td>
        </form>
        </tr>
        </p>
    </br></br></br>
</table>

<!-- quand on clique sur le bouton ajout on exucute la requete -->
<?php
if(isset($_GET['ajout'])){
    extract($_GET);
    $options=['cost'=>12,];
    $hashpass=password_hash($_GET['newpassword'], PASSWORD_BCRYPT, $options);
$q= $db ->prepare("INSERT INTO utilisateurs (pseudo, email, type, password)
                    VALUES ('".$_GET["newname"]."',
                   '".$_GET["newemail"]."',
                   '".$_GET["newtype"]."',
                   '".$hashpass."')");       
$q ->execute();
?>
    <div class='reponse'><h1>L'utilisateur a été ajouté !</h1></div>
    <?php   
} 
?>

</BODY>
</HTML>