<?php

    define('HOST', 'wgypahqwgypahq.mysql.db');
    define('DB_NAME', 'wgypahqwgypahq');
    define('USER', 'wgypahqwgypahq');
    define('PASS', 'Barcadhj288');
    

    try{
        $db=new PDO("mysql:host=".HOST.";dbname=" .DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connected > ok";
    }catch(PDOException $erreur){
        echo $erreur;
    }


?>