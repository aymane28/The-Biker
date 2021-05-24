<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
</head>
<body>
<link rel="stylesheet" href="../content/css/style.css" />
<link rel="stylesheet" href="../content/css/back1.css" />

<!-- direction vers la page modification quand l'utilisateur est connecté -->
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
<!-- connexion à la base de données -->
<?php include '../model/database.php';  global $db;?>

<!-- quand le bouton fronlogin est appuyé, on exécute la requete -->
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
                <?php $_SESSION['email'] = $result['email']; ?>
                <p> votre pseudo : <?=$result['email']; ?> </p>
                <?php  if($result['type']=='user'){
                    header("Location: ../index.php");}
                    else{ header("Location: ../controller/adminHome.php");
                exit();} ?>
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
