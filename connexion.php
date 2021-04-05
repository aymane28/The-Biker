<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

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

<h1>login</h1>
<form method="post">
    <input type="text" name="lpseudo" id="lpseudo" placeholder="Identifiant" required> <br/>
    <input type="text" name="lemail" id="lemail" placeholder="votre email" required><br/>
    <input type="password" name="lpassword" id="lpassword" placeholder="the password" required><br/>
    <input type="submit" name="fronlogin" id="Login">
</form>

<?php include 'database.php';  global $db;?>

<?php
if(isset($_POST['fronlogin'])){
    extract($_POST);
    global $db;

    if(!empty($_POST['lpseudo']) && !empty($_POST['lemail']) && !empty($_POST['lpassword']))
    {
        $q = $db -> prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $q -> execute(['email' => $_POST['lemail']]);
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
            echo "le compte portant le mail ".$_POST['lemail']."n'existe pas";}
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