<?php
    if(isset($_POST['valinc'])){
        extract($_POST);
        $q= $db ->query("SELECT * FROM produits where titre='moto1'");

        while ($donnees = $q->fetch())
{
    ?>

<p>
    <strong>La moto</strong> : <?php echo $donnees['titre']; ?><br />
    La marque : <?php echo $donnees['marque']; ?>, voici la photo echo <img src="<?php echo $donnees['image'];?>">  <br />
    le prix est de : <?php echo $donnees['prix']; ?>euros ! <br />la description <?php echo $donnees['description']; ?><br />
</p>
<?php echo "vous avez choisi cette moto !"; ?>

<form method="post">

</form>




<?php
}
}
$q->closeCursor();
?>