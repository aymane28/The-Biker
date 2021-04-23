<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
</head>
<body>

<link rel="stylesheet" href="styme.css" />
<link rel="stylesheet" href="css/style.css" />
<h1>Bienvenue dans notre site de vente </h1>

<?php
if(isset($_SESSION['lpseudo']) && ($_SESSION['lemail'])){
?>
<p> votre mail : <?=$_SESSION['pseudo']; ?> </p>
<p> votre mail : <?=$_SESSION['email']; ?> </p>

<?php
}else{
    echo "veuillez vous connectez";}
?>

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

<?php include 'data/database.php';  global $db;?>



<?php
if(isset($_POST['fronlogin'])){
    extract($_POST);
    global $db;

    if(!empty($_POST['lpseudo'])  && !empty($_POST['lpassword']))
    {
        $q = $db -> prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
        $q -> execute(['pseudo' => $_POST['lpseudo']]);
        $result= $q -> fetch();

        if($result == true){
            //le compte exixte bien
            $hashpassword = $result['password'];
            if(password_verify($lpassword, $result['password'])){
                echo "le mot de passe est bon";

              echo "vous etes connecté ". $_SESSION['pseudo']=$result['pseudo'];
              echo "vous etes connecté ". $_SESSION['email']=$result['email'];
              
                header("Location: produit.php");
                exit();
            }else{
                echo "le mot de passe n'est pas correcte";}
        }else{
            echo "le compte portant l'identifiant' ".$_POST['lpseudo']."n'existe pas";}
    }else{
        echo " veuillez compléter l'ensemble des champs"; }
}
?>


<h1>sign in</h1>
<form method="post">
    <input type="text" name="pseudo" id="pseudo" placeholder="Identifiant" required> <br/>
    <input type="text" name="semail" id="semail" placeholder="votre email" required><br/>
    <input type="password" name="password" id="password" placeholder="the password" required><br/>
    <input type="submit" name="fronsend" id="Signin">
</form>


<?php
    if(isset($_POST['fronsend'])){
        extract($_POST);
        if(!empty($_POST['pseudo']) && !empty($_POST['semail']) && !empty($_POST['password'])){
           
            $options=[
                'cost'=>12,
            ];
            $hashpass=password_hash($password, PASSWORD_BCRYPT, $options);
          
            $c = $db->prepare("SELECT email FROM utilisateurs where email = :email");
            $c ->execute([
             'email' => $_POST['semail']
                    ]);

            $result = $c->rowCount();

            if($result ==0){
            $q= $db ->prepare("INSERT INTO utilisateurs(pseudo,email,password) VALUES(:pseudo, :email, :password)");
            $q ->execute([
            'pseudo' =>$_POST['pseudo'],
            'email' => $_POST['semail'],
            'password'=> $hashpass
            ]);
            echo "le compte a été crée";
        }else{
            echo "un email existe déjà";}
         }
    }
?>
</body>
</html>