<!DOCTYPE html>
<html>
<head>
<title>Panier</title>
</head>
<body>
<body
background="/img/blue.jpg"></bodybackground>
<link rel="stylesheet" href="/css/styde.css" />
<link rel="stylesheet" href="/css/styme.css" />
<?php

include("header.php");
?>

<?php include 'data/database.php';global $db;?>


<?php
//print_r($_GET);
if(isset($_GET["current_value"]))
{
    if(isset($_GET["valinc"]))
    {
         $current_value=$_GET["current_value"]+1;
    }
    elseif(isset($_GET["valdec"]) && $_GET["current_value"] !=0)
    {   
          $current_value=$_GET["current_value"]-1;
    }else{
        $current_value=0;
    }
}else{
    $current_value=0;}
?>



<div class="container2">
    <div class="row2">
        <div class="col-md-offset-5 col-md-4 text-center">
        <h1 class='text-white'>Total</h1>
            <div class="form-login2">
                <form method="post">
                    <div class="total" >
                        <p> Prix à payer </p><input type="text" class="form1-control input-sm chat-input"value=" <?php
echo $price = isset($_GET['price']) ? $_GET['price'] : NULL;
?>">
                    </div></br></br>
                </form></br>
                     <a href="carte.php">
                    <input  type="submit" name="fronlogin"  class="btn-danger" id="Login" value="Payer"></a>
            </div>
        </div>
    </div></br></br></br>    
</div>



<div class="container3">
    <div class="row3">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>Mon Panier</h1>
              <div class="form-login3" ></br>
                    <form name="form2" method="get">
                         <p> Quantité </p><input type="text" class="form-control input-sm chat-input"value=" <?php
 echo $quantité = isset($_GET['quantité']) ? $_GET['quantité'] : NULL;
?>">
                    <!--    <input type="text" name="current_value"class="form-control1 input-sm chat-input" value="<?php echo $current_value; ?>"/>
-->
                    <img class ="img5" src=" <?php
 echo $image = isset($_GET['image']) ? $_GET['image'] : NULL; 
?>">    </br> 
                        
                    </form>
                 </div>
        </div></br></br></br>    
    </div>
</div>


<?php
   /*
       $q= $db ->prepare("INSERT INTO produits(titre,marque) VALUES(:titre, :marque)");
            $q ->execute([
        'titre' => 'moto2',
        'marque' => 'piwi'
            ]);

		
		if(isset($_POST['fronsend'])){
			extract($_POST);
			$q= $db ->prepare("DELETE From produits WHERE id>=2");	
			$q ->execute();
			echo "le compte a été crée";}
        else{
            echo "un email existe déjà";
        }*/
		
		
?>
<?php

include("footer.php");
?>
</body>
</html>