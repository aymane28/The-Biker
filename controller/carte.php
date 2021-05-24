<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Carte</title>
</head>
<body>
<link rel="stylesheet" href="../content/css/style.css" />
<link rel="stylesheet" href="../content/css/back1.css" />

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Carte</h1>
                <div class="form-login"></br></br>
                    <form method="post">
                        <input type="text" name="nom" id="nom"class="form-control input-sm chat-input" placeholder="Nom de la carte" required> <br/> </br>
                        <input type="text" name="num" id="num"class="form-control input-sm chat-input" placeholder="Numéro de la carte" maxlength="16" required> <br/></br>
                        <input  type="text" name="date" id="date" class="form-control input-sm chat-input" placeholder="Date d'expiration" maxlength="4" required><br/></br>
                        <input type="text" name="crypto" id="crypto"class="form-control input-sm chat-input" placeholder="Cryptogramme visuel" maxlength="3"  required><br/> </br>
                        <input type="submit" value="Valider" class="btn-danger"name="fronsend" id="Login"></br>
                    </form></br>
                </div>
        </div>
    </div>
</div></br></br></br>    

<?php include '../model/database.php';  global $db;?>

<?php
//action="panier.php"
    if(isset($_POST['fronsend'])){
        extract($_POST);
        if(!empty($_POST['nom']) && !empty($_POST['num']) && !empty($_POST['date']) && !empty($_POST['crypto'])){
            $mo= $_SESSION['id'];
            $c = $db->prepare("SELECT id FROM utilisateurs where id ='$mo'");
            $c ->execute();
            $result1 = $c->rowCount();
            $r = $db->prepare("SELECT id_utilisateurs FROM carte where id_utilisateurs ='$mo'");
            $r ->execute();
            $result2 = $r->rowCount();
          
            if($result1 ==true && $result2 ==false){
                $q= $db ->prepare("INSERT INTO carte(nom, num, date, crypto, id_utilisateurs) VALUES(:nom, :num, :date, :crypto, '". $_SESSION['id']."' )");
                 $q ->execute([
                'nom' =>$_POST['nom'],
                'num' =>$_POST['num'],
                'date' => $_POST['date'],
                 'crypto' =>$_POST['crypto']
                ]);?>
                <div class="sentence6" > <?php echo "La carte a été accepté!"; ?> </div>
                <!--header("Location: panier.php")-->
              <?php  header ("Refresh: 1; URL=panier.php");
            }else{ ?>
                <div class="sentence7" > <?php echo "Votre compte est déjà lié à une autre carte.";} ?> </div>
                <?php
        }     
    }
?>
<?php /*
$c = $db->prepare("SELECT nom FROM carte where nom = :nom");
$c ->execute([
 'nom' => $_POST['nom']
        ]);
        $result = $c->rowCount();
	if($result==0){
        echo "c'est bien";}
        else{ "le compte exixte déjà";}*/?>
</body>
</html>