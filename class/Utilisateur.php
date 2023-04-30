<?php
class Utilisateur 
{

    private $id;
    private $nom;
    private $prenom;
    private $mot_de_passe;
    
    public function setId($newId)
    {
        $this->id = $newId;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setNomUtilisateur($nom)
    {
        $this->nom = $nom;
    }
    public function getNomUtilisateur()
    {
        return $this->nom;
    }
    public function setAdresseEmail($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setmot_de_passe($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }
    public function getmot_de_passe()
    {
        return $this->mot_de_passe;
    }
    
    public function enregistrerUtilisateur() 
    {
        // Connexion à la base de données
        $GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=td_bbd', 'root', '');
        
        // Préparation de la requête SQL d'insertion
        $requete = $GLOBALS['bdd']->prepare('INSERT INTO client (nom, prenom, mot_de_passe) VALUES("' . $_POST["nom"] . '","' . $_POST["prenom"] . '","' . $_POST["mot_de_passe"] . '")');
        
        // Exécution de la requête avec les valeurs des propriétés de l objet
        $requete->execute(array($this->nom, $this->prenom, $this->mot_de_passe));
    }

    public function seConnecter($nom,$mot_de_passe)
    {
        $RequetSql = "SELECT * FROM `client` WHERE `nom` = '".$nom."' AND `mot_de_passe` = '".$mot_de_passe."';";

        $resultat = $GLOBALS["bdd"]->query($RequetSql); //resultat sera de type pdoStatement
        if ( $resultat->rowCount()>0){
            //echo "on a trouver le bon login";
           
            $tab = $resultat->fetch();
            $_SESSION['Connexion']=true;
            $_SESSION['id']=$tab['id'];

            $this->id_ = $tab['id'];
            $this->login_ = $tab['login'];

            return true;
        }else{
            // echo "Le login ".$_POST['login']." et le pass ".$_POST['pass']." n'est pas bon";
            return false;
        }
    }
}
?>