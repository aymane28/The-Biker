<!DOCTYPE html>
<html>
<head>
<title>inscription</title>
</head>
<body>
<link rel="stylesheet" href="/css/styde.css" />
<link rel="stylesheet" href="/css/styne.css" />

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Connexion</h1>
              <div class="form-login"></br></br>
                    <form method="post">
                         <input type="text" name="lpseudo" id="lpseudo" class="form-control input-sm chat-input" placeholder="Identifiant" required> <br/></br>
                        <input type="password" name="lpassword" id="lpassword" class="form-control input-sm chat-input" placeholder="Mot de passe" required></br></br>
                              <div class="wrapper">
                                    <input type="submit"  name="fronlogin"  class="btn-danger"id="Login" value="Se connecter">     
                             </div>
                    </form> </br>
                        <div class="item">
                             <h3>Vous n'avez pas de compte?</h3>
                                <a href="inscription.php" class="test"> <h4> Creer un compte</h4></a>      
                        </div>
                 </div>
        </div>
    </div></br></br></br>    
</div>

<?php include 'data/database.php';  global $db;?>

<?php
if(isset($_POST['fronlogin'])){
    extract($_POST);
    global $db;

    if(!empty($_POST['lpseudo']) && !empty($_POST['lpassword']))
    {
        $q = $db -> prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
        $q -> execute(['pseudo' => $_POST['lpseudo']]);
        $result= $q -> fetch();

        if($result == true){
            //le compte exixte bien
            $hashpassword = $result['password'];
            if(password_verify($lpassword, $result['password'])){
                ?>
                <div class="sentence" > <?php echo "le mot de passe est bon"; ?></div>

                <?php
              echo "vous etes connecté ". $_SESSION['pseudo']=$result['pseudo'];
              echo "vous etes connecté ". $_SESSION['email']=$result['email'];
              
                header("Location: produit.php");
                exit();
            }else{ ?>
                <div class="sentence" > <?php   echo "le mot de passe n'est pas correcte";}?></div>
           <?php     
        }else{ ?>
                <div class="sentence" > <?php   echo "le compte portant l'dentifiant' ".$_POST['lpseudo']."n'existe pas";}?></div>
            <?php
            }else{ ?>
                <div class="sentence" > <?php  echo " veuillez compléter l'ensemble des champs"; }?></div>
                <?php
            }
?>
</body>
</html>
