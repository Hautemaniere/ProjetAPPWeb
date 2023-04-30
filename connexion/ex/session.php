<?php
session_start()

try {
    $ipserver = "exodialtdbdd.mysql.db";
    $nomBase = "exodialtdbdd";
    $loginPrivilege = "exodialtdbdd";
    $passPrivilege = "Minibn80";
    $GLOBALS["bdd"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

    } catch (Exception  $error) {
    echo $error->getMessage();
    }

    if(isset($_POST['connexion'])){
        //oui
        $ReqSql = 'SELECT * FROM `client` WHERE `nom` = "'.$_POST['nom'].'" AND `mot_de_passe` = "'.$_POST['mot_de_passe'].'"; ';

        $result = $bdd->query($ReqSql);
        if($result->rowCount()>0){

            $_SESSION['Connexion'] = true;

        }else{ 
            echo" mauvais log ";
        }


    }else{
        //non
        echo" id toi ";
    }

    if(isset($_POST['deconnexion'])){
        echo "vous etes deco";
        session_unset();
        session_destroy();
    }

        
    if(isset($_SESSION['Connexion'])){
        echo " deja co ";
        ?>
        

        <form action="" method="post">

           <input type="submit" name="deconnexion" value="Se deco">
       </form>
        <?php

    }else{

        ?>
        

     <form action="" method="post">
        Nom d'Utilisateur : <input type="text" name="nom" value="HAUTEMANIERE" />
        Mot de passe : <input type="text" name="mot_de_passe" value="root" />
        <input type="submit" name="connexion">
    </form>
     <?php
    }
?>