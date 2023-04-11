<?php
include("Utilisateur.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Créer un nouvel objet Utilisateur
    $utilisateur = new Utilisateur();
    
    // Définir les propriétés de l'objet avec les données du formulaire
    $utilisateur->setNomUtilisateur($_POST['nom']);
    $utilisateur->setAdresseEmail($_POST['prenom']);
    $utilisateur->setMotDePasse($_POST['mot_de_passe']);
    
    // Enregistrer l'utilisateur dans la base de données
    $utilisateur->enregistrerUtilisateur();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    
    <form method="POST" action="inscription.php">
        <label for="nom_utilisateur">Nom :</label>
        <input type="text" name="nom" required>
        <br><br>
        
        <label for="adresse_email">prenom :</label>
        <input type="text" name="prenom" required>
        
        <br><br>
        
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>
        
        <br><br>
        
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
