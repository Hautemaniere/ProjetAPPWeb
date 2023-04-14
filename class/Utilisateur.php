<?php
class Utilisateur {
    private $nom;
    private $id;
    private $prenom;
    private $mot_de_passe;
    
    public function setNomUtilisateur($nom) {
        $this->nom = $nom;
    }
    
    public function setAdresseEmail($prenom) {
        $this->prenom = $prenom;
    }
    
    public function setMotDePasse($mot_de_passe) {
        $this->mot_de_passe = $mot_de_passe;
    }
    
    public function enregistrerUtilisateur() {
        // Connexion à la base de données
        $GLOBALS['bdd'] = new PDO('mysql:host=192.168.64.140;dbname=td_BDD', 'root', 'root');
        
        // Préparation de la requête SQL d'insertion
        $requete = $GLOBALS['bdd']->prepare('INSERT INTO client (nom, prenom, mot_de_passe) VALUES("' . $_POST["nom"] . '","' . $_POST["prenom"] . '","' . $_POST["mot_de_passe"] . '")');
        
        // Exécution de la requête avec les valeurs des propriétés de l objet
        $requete->execute(array($this->nom, $this->prenom, $this->mot_de_passe));
    }

    public function seConnecter($nom,$mdp){
        // Préparation de la requête SQL de sélection
    $requete = $GLOBALS['bdd']->prepare('SELECT * FROM client WHERE prenom = ? AND mot_de_passe = ?');
    
    // Exécution de la requête avec les valeurs des champs de formulaire
    $requete->execute(array($nom, $mdp));
    echo "julien 4";
    // Vérifier si les informations de connexion sont valides
    if ($requete->rowCount() > 0) {
        // Récupérer le nom d'utilisateur de la première ligne de résultats
        $resultat = $requete->fetch();
        $this->nom = $resultat['nom'];
        $this->id = $resultat['id'];
        // Stocker le nom d'utilisateur dans la variable de session
        $_SESSION['id'] = $resultat['id'];
        echo "julien 5";
        // Afficher un message de bienvenue
        return true;
    } else {
        // Afficher un message d'erreur
        echo "julien 6";
       return false;
       
    }
    }
}
?>