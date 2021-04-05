<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<h1> page pour modifier ses informations <h1>

<p> Mofication des informations de la part de: <?=$_SESSION['pseudo']; ?> </p>

<title>Page Title</title>
</head>
<body>

<?php include 'database.php'; global $db; ?>

<h1>Modifications</h1>
<form method="post">

    <strong>entrer son identifiant actuel</strong>
    <input type="text" name="dpseudo" id="dpseudo" placeholder="Identifiant" required> <br/><br/>

    <em>changer son identifiant </em>
    <pre> entrer votre nouveau identifiant</pre>
    <input type="text" name="mpseudo" id="mpseudo" placeholder="Identifiant" required> <br/><br/><br/><br/>

    <input type="password" name="lpassword" id="lpassword" placeholder="the password" required><br/><br/>
    <input type="submit" value="Valider" name="fronlogin" id="Login">
</form>


<?php
if(isset($_POST['fronlogin'])){
    extract($_POST);

    global $db;

    if(!empty($_POST['dpseudo'])  &&  !empty($_POST['mpseudo']) &&  !empty($_POST['mpseudo']))
    {
        $q = $db -> prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
        $q -> execute(['pseudo' => $_POST['dpseudo']]);
        $result= $q -> fetch();

        $nv_iden=$_POST['mpseudo'];

        if($result ==true){
            //$q= $db ->prepare("INSERT INTO utilisateurs(pseudo) VALUES (:pseudo)");
            $q= $db ->prepare("UPDATE utilisateurs SET pseudo =  '$nv_iden' WHERE pseudo = :pseudo");
            
            $q ->execute([
            'pseudo' =>$_POST['dpseudo']
            ]);
            echo "l'identifiant a été modifié"; 
        }else{
            echo "l'identifiant n'a pas été modifié"; 
        }
    
        if($result == true){
            //le compte exixte bien
            $hashpassword = $result['password'];
            if(password_verify($lpassword, $result['password'])){
                echo "le mot de passe est bon";
            }else{
                echo "le mot de passe n'est pas correcte";
            }
        }else{
            echo "le compte portant lepseudo ".$_POST['dpseudo']."n'existe pas";
        }
    }
    else{
        echo " veuillez compléter l'ensemble des champs";
    }
}
?>
</body>
</html>