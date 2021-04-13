<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<title>carte</title>
<strong>Inserer votre carte<Strong>
</head>
<body>
<link rel="stylesheet" href="styleaymane.css" />
<p> Bienvenue: <?=$_SESSION['pseudo']; ?> </p>
<p> Votre mail : <?=$_SESSION['email']; ?> </p>
<p></p>

<div class="aymane" >
aymaneeee
</div>


<form method="post" >
<div  class="aymane" > 
    <label for="staticEmail2" class="sr-only">Email</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
  </div>
  <div class="aymane">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <button type="button" class="btn btn-success">Confirm identity</button>


<div  class="aymane">
    <label1 >Password</label1>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
    <div> insérez votre identifiant</div></br>
    <input type="text" name="nom" id="nom" placeholder="Identifiant" required> <br/>
    <p> insérez le numéro de votre carte </p>
    <input type="number" name="num" id="num" placeholder="numéro de la carte" maxlength="16" required> <br/>

    <p> Date d'expiration </p>
    <input type="date" name="date" id="date" placeholder="date d'expiration" maxlength="4" required><br/>

    <p>entrer votre cryptogramme visuel</P>
    <input type="number" name="crypto" id="crypto" placeholder="cryptogramme visuel" maxlength="3"  required><br/>
    <input type="submit" value="Valider" name="fronsend" id="Login"></br>
</form>

<?php include 'database.php';  global $db;?>


<p>aymane je sais pas quieufugsfgzehfguhzeru</p>

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
            ]);
            echo "la carte a été accepté";
            echo "votre carte avec l'identifiant :". $_SESSION['nom']=$_POST['nom'] ."a été enregistrée";
           
            
             // header("Location: panier.php");

            }else{
            echo "votre identifiant n'est pas bon ou est déjà lié à une autre carte";}
        }

        
    }
?>



</body>
</html>