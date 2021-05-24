<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>ValidationPayement</title>
</head>
<body>
<link rel="stylesheet" href="../content/css/style.css" />
<link rel="stylesheet" href="../content/css/back1.css" />

<?php include '../model/database.php';  global $db;?> 

<!--se connecter à la base de données-->
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Validation du payement</h1>
                <div class="form-login"></br></br>
                    <form method="post" action="../model/deconnexion.php"> <!--se déconnecter -->
                        <p> Merci pour votre achat</br> <?php echo $_SESSION['pseudo'] ?></br> </br> <!-- Récupération du nom de la session -->
                            Nous avons envoyé votre reçu dans votre boite mail.  </p> </br>
                            <input type="submit" value="Revenir au site The Biker" class="btn-danger"name="fronsend" id="Login"> </br>
                    </form></br>
                </div>
        </div>
    </div></br></br></br>    
</div>

</body>
</html>