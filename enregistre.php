<?php
session_start();
$cbdd = new PDO('mysql:host=192.168.64.140;dbname=td_BDD', 'root', 'root');
$cbdd->exec('INSERT INTO client (nom, prenom, mot_de_passe) VALUES("'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['mot_de_passe'].'")');
header('location: index.php');
?> 
