<?php
// Démarre la session pour avoir les informations de l'utilisateur
if (session_status() == PHP_SESSION_NONE){
  session_start();
  session_destroy();
} ?>

<!DOCTYPE html>
<html lang="fr">
<head>

  <title>indexAcceuil</title>
</head>
<body>
<?php include 'acceuil.php'; ?>
</body>
</html>