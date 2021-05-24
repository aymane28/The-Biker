<?php
session_start();
 include '../model/database.php'; global $db;
?>

<HTML>
<HEAD>
<TITLE>Home</TITLE>
<body
    background="../content/img/blue.jpg"></bodybackground>
    <link rel="stylesheet" href="../content/css/admin1.css" />
</HEAD>
<BODY>

<div class='text7'><h1>Bienvenue dans la partie Admin</h1></br></div>


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
    </table>

    <img class="imgadm" src="../content/img/admimg.jpg">
    
</bodyY>
</html>
