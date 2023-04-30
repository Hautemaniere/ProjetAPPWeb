<?php
include("class/Utilisateur.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Créer un nouvel objet Utilisateur
    $utilisateur = new Utilisateur();

    // Définir les propriétés de l'objet avec les données du formulaire
    $utilisateur->setNomUtilisateur($_POST['nom']);
    $utilisateur->setmot_de_passe($_POST['mot_de_passe']);

    // Enregistrer l'utilisateur dans la base de données
    $utilisateur->seConnecter($_POST['nom'] , $_POST['mot_de_passe']);
}
?>

<html>
<body>
    <form action="" method="post">
        Nom : <input type="text" name="nom">
        Mot de passe : <input type="password" name="mot_de_passe">
        Pas encore de compte ? <a href="inscription.php">Inscrivez-vous.</a>
        <input type="submit" name="connexion">
</form>
</body>
</html>