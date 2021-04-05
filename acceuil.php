<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<strong>bienvenue sur notre site de vente de moto<Strong>
</head>
<body>
<link rel="stylesheet" href="style.css" />

<form method="post">
    <input type="submit" value="Se connecter" name="fronlogin" id="Login">
</form>


<?php
if(isset($_POST['fronlogin'])){
    extract($_POST);
    header("Location: connexion.php");
    exit();}
                ?>

</body>
</html>