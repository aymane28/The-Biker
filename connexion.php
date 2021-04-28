<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
</head>
<body>

<link rel="stylesheet" href="/css/styke.css" />
<link rel="stylesheet" href="/css/background.css" />

<?php if (isset($_SESSION['pseudo'])) {
    header("Location:modifications.php");} ?>
 


<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Connexion</h1></br>   
              <div class="form-login"></br>
                    <form method="post">
                         <input type="text" name="lpseudo" id="lpseudo" class="form-control input-sm chat-input" placeholder="Identifiant" required> <br/></br>
                        <input type="password" name="lpassword" id="lpassword" class="form-control input-sm chat-input" placeholder="Mot de passe" required></br></br>
                              <div class="wrapper">
                                    <input type="submit"  name="fronlogin"  class="btn-danger"id="Login" value="Se connecter">     
                             </div>
                    </form> </br>
                        <div class="item">
                             <h3>Vous n'avez pas de compte?</h3>
                                <a href="inscription.php" class="test"> <h4> Créer un compte</h4></a>      
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
                <div class="sentence8" > <?php echo "Le mot de passe est bon !"; ?></div>

                <p> votre pseudo : <?=$_SESSION['pseudo'] = $result['pseudo']; ?> </p>
                <p> votre pseudo : <?=$_SESSION['id'] = $result['id']; ?> </p>

                

<p> votre pseudo : <?=$result['email']; ?> </p>


              <?php  header("Location: acceuil.php");
                exit(); ?>
                <?php
             
              
            }else{ ?>
                <div class="sentence9" > <?php   echo "Le mot de passe n'est pas correcte.";}?></div>
           <?php     
        }else{ ?>
                <div class=sentence7 > <?php   echo "Le compte portant l'dentifiant: ".$_POST['lpseudo']." n'existe pas";}?></div>
            <?php
            }else{ ?>
                <div class="sentence" > <?php  echo " Veuillez compléter l'ensemble des champs !"; }?></div>
                <?php
            }
?>

</body>
</html>
