<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Modifications</title>
</head>
<body>
<link rel="stylesheet" href="../content/css/style.css" />
<link rel="stylesheet" href="../content/css/back1.css" />
<link rel="stylesheet" href="../content/css/admin1.css" />

<?php include '../model/database.php';global $db; global $dr;?>

<?php if (isset($_SESSION['pseudo'])) { ?>
    <form action="../model/deconnexion.php">
        <input type="submit" name="envoi" class="subdeco" value="Déconnexion" /> 
        </form>
        <form action="../view/historiquecom.php">
        <input type="submit" name="envoi" class="subhist" value="Historique des commandes" /> 
    </form> <?php }  ?>


<div class="container4">
    <div class="row4">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Modifier vos informations</h1></br>
              <div class="form-login4">
                    <div class="total2" >
                        <form method="post">
                            <p> Identifiant: </p>
                                <input type="text" name="mpseudo" id="mpseudo" class="form-control2 input-sm chat-input" placeholder="Nouveau Identifiant" required> 
                                <input type="text" name="dpseudo" id="dpseudo" class="form-control2 input-sm chat-input" placeholder="Identifiant actuel" required></br></br>
                            <p> Email:</p>
                                <input type="text" name="memail" id="memail" class="form-control2 input-sm chat-input" placeholder="Nouveau email" required> 
                                <input type="text" name="demail" id="demail" class="form-control2 input-sm chat-input" placeholder="Email actuel" required></br></br>
                            <p> Entrez votre mot de passe:</p>
                                <input type="password" name="lpassword" id="lpassword" class="form-control3 input-sm chat-input" placeholder="Mot de passe" required></br></br>
                                <input type="submit"  name="fronlogin"  class="btn-danger3"id="Login" value="Valider">     </br>  
                        </form>
                            <p> Carte:</p>
                            <form method="get">
                                <input  type="submit" name="front"  class="btn-danger4" id="Login" value="Supprimer les données de votre carte"></br></br></br> 
                            </form>
                    </div></br></br>
                </div>
        </div>
    </div></br></br></br>    
</div>

<?php
if(isset($_POST['fronlogin'])){
    extract($_POST);
    global $db; global $dr;
    //pseudo
    if(!empty($_POST['dpseudo'])  &&  !empty($_POST['mpseudo']) )
    {
        $q = $db -> prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
        $q -> execute(['pseudo' => $_POST['dpseudo']]);
        $result= $q -> fetch();
        $nv_iden=$_POST['mpseudo'];
        $hashpassword = $result['password'];
        if($result ==true){
            if(password_verify($lpassword, $result['password'])){
            //$q= $db ->prepare("INSERT INTO utilisateurs(pseudo) VALUES (:pseudo)");
            $q= $db ->prepare("UPDATE utilisateurs SET pseudo =  '$nv_iden' WHERE pseudo = :pseudo");
            $q ->execute([
            'pseudo' =>$_POST['dpseudo']
            ]); ?>
           <div class="sentence5" > <?php  echo "L'identifiant a été modifié";  ?> </div>
                <?php
        }
            }else{ ?>
            <div class="sentence7" > <?php  echo "L'identifiant n'a pas été modifié";  ?> </div>
            <?php }
    
        if($result == true){
            //le compte exixte bien
            $hashpassword = $result['password'];
            if(password_verify($lpassword, $result['password'])){ ?>
                <div class="sentence8" > <?php   echo "Le mot de passe est bon";  ?> </div>
           <?php }else{ ?>
                <div class="sentence9" > <?php   echo "Le mot de passe n'est pas correcte";  ?> </div>
           <?php 
           }
            }else{ ?>
            <div class="sentence10" > <?php   echo "Le compte portant l'identifiant: ".$_POST['dpseudo']." n'existe pas";  ?> </div>
            <?php }
    }

    //email
    if(!empty($_POST['demail'])  &&  !empty($_POST['memail']) )
    {
        $l = $db -> prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $l -> execute(['email' => $_POST['demail']]);
        $result2= $l -> fetch();

        $nv_iem=$_POST['memail'];

        $hashpassword = $result2['password'];
        if($result2 ==true){
            if(password_verify($lpassword, $result2['password'])){
            //$q= $db ->prepare("INSERT INTO utilisateurs(pseudo) VALUES (:pseudo)");
            $l= $db ->prepare("UPDATE utilisateurs SET email =  '$nv_iem' WHERE email = :email");
            $l ->execute([
            'email' =>$_POST['demail']
            ]); ?>
           <div class="sentence6" > <?php  echo "L'email a été modifié";  ?> </div>
                <?php
                
                header ("Refresh: 2;URL=../model/deconnexion.php");
        }
            }else{ ?>
            <div class="sentence7" > <?php  echo "L'email n'a pas été modifié";  ?> </div>
            <?php }
    
        if( $result2 ==true){
            //le compte exixte bien
            $hashpassword = $result2['password'];
            if(password_verify($lpassword, $result2['password'])){ ?>
                <div class="sentence8" > <?php   echo "Le mot de passe est bon";  ?> </div>
            <?php 
        }else{ ?>
                <div class="sentence9" > <?php   echo "Le mot de passe n'est pas correcte";  ?> </div>
            <?php }
                }else{ ?>
                    <div class="sentence8" > <?php   echo "Le compte portant l'email: ".$_POST['demail']." n'existe pas";  ?> </div>
                    <?php }
    }
        else{ ?>
            <div class="sentence9" > <?php  echo " Veuillez compléter l'ensemble des champs";  ?> </div>
        <?php
    }
    
}
?>

<div class="container6">
    <div class="row6">
        <div class="col-md-offset-5 col-md-4 text-center">

            <div class='text6'><h1>Vos informations</h1></br></div>
              <div class="form-login6">
                    <div class="total6" >
                        <form method="post">
                            <p> Identifiant: </p>
                            <div class="ecr6">
                               <h1> <?php echo $_SESSION['pseudo'] ?> </h1></div></br>
                            <p> Email:</p>
                            <div class="ecr6">
                                <h1> <?php    echo $_SESSION['email'] ?> </h1></div></br>
                                <p> Numéro de votre carte:</p>
                            <div class="ecr6">

                                <h1> <?php  $mo= $_SESSION['id'];
 
 
 $q= $db ->query("SELECT * FROM carte where id_utilisateurs='$mo'");
 if ($donnees = $q->fetch())
 {   echo $donnees['num']; }else{ echo "Aucune carte n'est insérée";
    ?> <a href="carte.php" class="inser"> <h4> Inserez votre carte</h4></a>   
 <?php }?> </h1></div>
                        </form>
                           
                    </br>
                </div>
        </div>
    </div></br></br></br>    
</div>

<?php 
if(isset($_GET['front'])){
    extract($_GET);
    $q= $db ->query("DELETE FROM carte where id_utilisateurs='$mo'");
    echo "La carte a bien été supprimé !"; 
    header('Location: modifications.php');
} ?>


</body>
</html>