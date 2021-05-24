<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
</head>
<body> 
<link rel="stylesheet" href="../content/css/style.css" />
<link rel="stylesheet" href="../content/css/back1.css" />

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>S'inscrire</h1></br>   
                <div class="form-login"></br>
                    <form method="post">
                        <input type="text" name="pseudo" id="pseudo" class="form-control input-sm chat-input" placeholder="Identifiant" required> <br/></br>  
                        <input type="text" name="semail" id="semail" class="form-control input-sm chat-input"placeholder="Votre email" required><br/></br>  
                        <input type="password" name="lpassword" id="lpassword" class="form-control input-sm chat-input" placeholder="Mot de passe" required>   </br></br>  
                            <div class="wrapper">
                                <input type="submit" name="fronsend" class="btn-danger"id="Signin">     
                            </div>
                    </form></br>
                        <div class="item">
                            <h3>Vous avez déjà un compte?</h3>
                            <a href="connexion.php" class="test"> <h4> Se connecter</h4></a>      
                        </div>
                </div>
        </div>
    </div></br></br>  
</div>

<?php include '../model/database.php';  global $db;?>

<?php
if(isset($_POST['fronsend'])){
    extract($_POST);

    if(!empty($_POST['pseudo']) && !empty($_POST['semail']) && !empty($_POST['lpassword'])){
        $options=['cost'=>12,];
        $hashpass=password_hash($_POST['lpassword'], PASSWORD_BCRYPT, $options);
      
        $c = $db->prepare("SELECT email FROM utilisateurs where email = :email");
        $c ->execute([
         'email' => $_POST['semail']
                ]);
        $result = $c->rowCount();
        if($result ==0){
        $q= $db ->prepare("INSERT INTO utilisateurs(pseudo,email,type,password) VALUES(:pseudo, :email,'user', :password)");
        $q ->execute([
        'pseudo' =>$_POST['pseudo'],
        'email' => $_POST['semail'],
        'password'=> $hashpass
        ]);?>
        <div class="sentence" > <?php echo "Le compte a bien été crée !";?></div>   
        <div class="sentence6" > <?php  echo "Vous aller être redirigé vers la page de connexion dans 3 secondes";?> </div>
        <?php  header ("Refresh: 2;URL=connexion.php");
    }else{ ?>
        <div class="sentence11" > <?php echo "L'adresse mail saisie existe déjà";}?></div>
        <?php
     }
}
?>
</body>
</html>