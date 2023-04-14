<?php
class Pack
{

    private $id;
    private $Marque;
    private $Model;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId($id)
    {
        return $this->id;
    }

    public function setMarque($Marque)
    {
        $this->Marque = $Marque;
    }
    public function getMarque($Marque)
    {
        return $this->Marque;
    }

    public function setModel($Model)
    {
        $this->Model = $Model;
    }
    public function getModel($Model)
    {
        return $this->Model;
    }

    public function __construct($id, $Marque, $Model)
    {
        $this->id = $id;
        $this->Marque = $Marque;
        $this->Model = $Model;
    }

    public function getAllPack()
    {

        $lesPacks = array();
        $req = 'SELECT * FROM `pcloc` ';

        $resultat = $GLOBALS['bdd']->query($req);
        while ($tab = $resultat->fetch) {
            $pack = new Pack($tab['id'], $tab['Marque'], $tab['Model']);
            array_push($lesPacks, $pack);
        }
        return $lesPacks;
    }

    public function getPackById($id)
    {

        //$tabfect = reponse->fetch()
        //$this->marque = $tabfect["marque"];

        $lesPacks = array();
        $req = 'SELECT id FROM `pcloc` ';

        $resultat = $GLOBALS['bdd']->query($req);
        if ($resultat->rowCount() > 0){
            $tab = $resultat->fetch();
            $this->id = $tab['id'];

        }
            
        }


    public function newPack($nmarque, $model)
    {

        $requete ='INSERT INTO `pcloc` (`Marque`, `Model`) VALUES ("' . $_POST["Marque"] . '","' . $_POST["Model"] . '")';
        echo $requete;
        $requete = $GLOBALS['pdo']->query($requete);
        if ($requete->rowCount() > 0) {

            return $GLOBALS['pdo']->lastInsertID();;
        } else {
            return 0;
        }
    }
}