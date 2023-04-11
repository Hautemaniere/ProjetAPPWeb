<?php
    try
        {
  $ipserver="192.168.64.140";  // Mettre l'ip
  $nomBase="td_BDD";
  $loginPrivilege ="root";
  $passPrivilege="root";
  $BasePDO= new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);
 }catch(Exception $e){
    die('Erreur'.$e->getMessage());
 }
 ?>