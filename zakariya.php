<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
</head>
<body> 
<link rel="stylesheet" href="/css/styse.css" />
<link rel="stylesheet" href="/css/background.css" />

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>S'inscrire</h1></br>   
                <div class="form-login"></br>
                     <form method="post">
                            <input type="text" name="pseudo" id="pseudo" class="form-control input-sm chat-input" placeholder="Identifiant" required> <br/></br>  
                                <div class="wrapper">
                                    <input type="submit" name="fronsend" class="btn-danger"id="Signin">     
                                </div>
                        </form></br>
                      
                </div>
        </div>
    </div></br></br>  
</div>

<?php include 'data/database.php';  global $db;?>

<?php
if(isset($_POST['fronsend'])){
    extract($_POST);

    if(!empty($_POST['pseudo'])){
        $options=['cost'=>12,];
       
      
        $c = $db->prepare("SELECT * FROM utilisateurs");
       
        $result = $c->rowCount();

        if($result ==0){
        $q= $db ->prepare("INSERT INTO utilisateurs(pseudo) VALUES(:pseudo)");
        $q ->execute([
        'pseudo' => $_POST['pseudo']
        
       
        ]);?>
        <div class="sentence" > <?php echo "Le compte a été crée !";?></div>
    <?php
    }else{ ?>
        <div class="sentence11" > <?php echo "L'adresse mail saisie existe déjà";}?></div>
        <?php
     }
}
?>
</body>
</html>