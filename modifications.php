<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Modifications</title>
</head>
<body>
<link rel="stylesheet" href="styse.css" />
<link rel="stylesheet" href="/css/styne.css" />


<?php include 'data/database.php'; global $db; ?>

<div class="container4">
    <div class="row4">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Modifier vos informations</h1></br>
              <div class="form-login4">
                <div class="total2" >
                    <form method="post">

                    <p> Identifiant: </p>
    <input type="text" name="dpseudo" id="dpseudo" class="form-control2 input-sm chat-input" placeholder="Identifiant" required> <br/>
    <input type="text" name="mpseudo" id="mpseudo" class="form-control2 input-sm chat-input" placeholder=" Nouveau identifiant" required> <br/>

    <div class="pretext" ><pre> Entrer votre nouveau identifiant</pre> </div>
    <input type="text" name="mpseudo" id="mpseudo" class="form-control2 input-sm chat-input" placeholder=" Nouveau identifiant" required> <br/>
    </br>
    <input type="password" name="lpassword" id="lpassword" class="form-control2 input-sm chat-input" placeholder="Mot de passe" required><br/>
    </br>
    <input type="submit" value="Valider" class="btn-danger" name="fronlogin" id="Login">
    </form> </br> </div></br></br>
                 </div>
        </div>
    </div></br></br></br>    
</div>


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
            ]); ?>

           <div class="sentence" > <?php  echo "l'identifiant a été modifié";  ?> </div>
                <?php
        }else{ ?>
            <div class="sentence" > <?php  echo "l'identifiant n'a pas été modifié";  ?> </div>
       <?php
        }
    
        if($result == true){
            //le compte exixte bien
            $hashpassword = $result['password'];
            if(password_verify($lpassword, $result['password'])){ ?>
                <div class="sentence" > <?php   echo "le mot de passe est bon";  ?> </div>
           <?php }else{ ?>
                <div class="sentence" > <?php   echo "le mot de passe n'est pas correcte";  ?> </div>
           <?php }
        }else{ ?>
            <div class="sentence" > <?php   echo "le compte portant lepseudo ".$_POST['dpseudo']."n'existe pas";  ?> </div>
         <?php }
    }
    else{ ?>
        <div class="sentence" > <?php  echo " veuillez compléter l'ensemble des champs";  ?> </div>
        <?php
    }
}
?>
</body>
</html>