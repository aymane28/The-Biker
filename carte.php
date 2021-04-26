<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Carte</title>
</head>
<body>
<link rel="stylesheet" href="/css/styse.css" />
<link rel="stylesheet" href="/css/background.css" />

<h7> Salut: <?=$_SESSION['pseudo']; ?> </h7>
<p> Votre mail est : <?=$_SESSION['email']; ?> </p>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Carte</h1>
                <div class="form-login"></br></br>
                    <form method="post">
                        <input type="text" name="nom" id="nom"class="form-control input-sm chat-input" placeholder="Identifiant" required> <br/> </br>
                        <input type="text" name="num" id="num"class="form-control input-sm chat-input" placeholder="Numéro de la carte" maxlength="16" required> <br/></br>
                        <input  type="text" name="date" id="date" class="form-control input-sm chat-input" placeholder="Date d'expiration" maxlength="4" required><br/></br>
                         <input type="text" name="crypto" id="crypto"class="form-control input-sm chat-input" placeholder="Cryptogramme visuel" maxlength="3"  required><br/> </br>
                        <input type="submit" value="Valider" class="btn-danger"name="fronsend" id="Login"></br>
                      </div>
                     </form></br>
                </div>
        </div>
    </div></br></br></br>    
</div>

<?php include 'data/database.php';  global $db;?>

<?php
//action="panier.php"
    if(isset($_POST['fronsend'])){
        extract($_POST);
        if(!empty($_POST['nom']) && !empty($_POST['num']) && !empty($_POST['date']) && !empty($_POST['crypto'])){
           
            $mo= $_POST['nom'];

            $c = $db->prepare("SELECT pseudo FROM utilisateurs where pseudo ='$mo'");
            $c ->execute([
             'pseudo' => $_POST['nom']
                    ]);

           $result1 = $c->rowCount();

           $r = $db->prepare("SELECT nom FROM carte where nom ='$mo'");
           $r ->execute([
            'nom' => $_POST['nom']
                   ]);

            $result2 = $r->rowCount();
            //erfberhfrehrb

           if($result1 ==true && $result2 ==false){
            $q= $db ->prepare("INSERT INTO carte(nom, num, date, crypto) VALUES(:nom, :num, :date, :crypto)");
            $q ->execute([
            'nom' =>$_POST['nom'],
            'num' =>$_POST['num'],
            'date' => $_POST['date'],
            'crypto' =>$_POST['crypto']
            ]);?>
            <div class="sentence6" > <?php echo "La carte a été accepté"; ?> </div>
            <div class="sentence8" > <?php echo "Votre carte avec l'identifiant :". $_SESSION['nom']=$_POST['nom'] ." a été enregistrée."; ?> </div><?php
             // header("Location: panier.php")
            }else{ ?>
                <div class="sentence7" > <?php echo "Votre identifiant n'est pas bon, ou est déjà lié à une autre carte.";} ?> </div>
            <?php
        }     
    }
?>
</body>
</html>