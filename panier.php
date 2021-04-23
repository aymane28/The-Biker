<!DOCTYPE html>
<html>
<head>
<title>Panier</title>
</head>
<body>

<body
background="blue.jpg"></bodybackground>
    <link rel="stylesheet" href="stype.css" />
    <link rel="stylesheet" href="styme.css" />
<?php include 'data/database.php';
            global $db;?>


<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Connexion</h1>
              <div class="form-login"></br>
                </br>

<form method="post">
    <input type="text" name="lpseudo" id="lpseudo" class="form-control input-sm chat-input"placeholder="Identifiant" required> <br/>
    </br>
    <input type="password" name="lpassword" id="lpassword" class="form-control input-sm chat-input"placeholder="Mot de passe" required><br/>
    </br>
    <input type="submit" name="fronlogin" id="Login">
</form>

                <h4> Creer un compte </h4>
            </div>
        </div>
    </div>
    </br></br></br>    
</div>







<?php
//print_r($_GET);
if(isset($_GET["current_value"]))
{
    if(isset($_GET["valinc"]))
    {
         $current_value=$_GET["current_value"]+1;
    }
    elseif(isset($_GET["valdec"]) && $_GET["current_value"] !=0)
    {   
          $current_value=$_GET["current_value"]-1;
    }else{
        $current_value=0;
    }
}
else{
    $current_value=0;
    }
?>




<form name="form1" method="get">
    <input type="submit" name="valinc" value="ajoutez le produit">
    <input type="submit" name="valdec" value="enlever le produit">
    <input type="text" name="current_value" value="<?php echo $current_value; ?>"/>
</form>



<?php
   /*
       $q= $db ->prepare("INSERT INTO produits(titre,marque) VALUES(:titre, :marque)");
            $q ->execute([
        'titre' => 'moto2',
        'marque' => 'piwi'
            ]);

		
		if(isset($_POST['fronsend'])){
			extract($_POST);
			$q= $db ->prepare("DELETE From produits WHERE id>=2");	
			$q ->execute();
			echo "le compte a été crée";}
        else{
            echo "un email existe déjà";
        }*/
		
		
?>




</body>
</html>