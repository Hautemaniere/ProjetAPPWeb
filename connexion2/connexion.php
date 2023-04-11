<?php
session_start();
echo "julien 1";
try {
    $GLOBALS['bdd']= new PDO('mysql:host=192.168.64.140;dbname=td_BDD', 'root', 'root');
} catch (Exception $th) {
    echo $th->getMessage();
}



include("Utilisateur.php");
echo "julien 2";
$utilisateur = new Utilisateur();
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    echo "julien 3";
    $isConnect  = $utilisateur->seConnecter($_POST['prenom'],$_POST['mot_de_passe']);
    echo "<br>isConnect : ".$isConnect;
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    
    <form method="POST" action="connexion.php">
        <label for="prenom">prenom :</label>
        <input type="text" name="prenom" required>
        
        <br><br>
        
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>
        
        <br><br>
        
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
