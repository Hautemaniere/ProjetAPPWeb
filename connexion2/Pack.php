<?php
class Pack{

    private $id;
    private $Marque;
    private $Model;

    public function setId($id){
        $this->id = $id;
    }
    public function getId($id){
        return $this->id;
    }

    public function setMarque($Marque){
        $this->Marque = $Marque;
    }
    public function getMarque($Marque){
        return $this->Marque;
    }

    public function setModel($Model){
        $this->Model = $Model;
    }
    public function getModel($Model){
        return $this->Model;
    }

    public function __construct($id, $Marque, $Model)
    {
        $this->id = $id;
        $this->Marque = $Marque;
        $this->Model = $Model;
    }

    public function getAllPack(){

        $lesPacks = array();
        $req = 'SELECT * FROM `pcloc` ' ;

        $resultat = $GLOBALS['bdd']->query($req);
        while($tab = $resultat->fetch)
        {
        $pack = new Pack($tab['id'],$tab['Marque'],$tab['Model']);
        array_push($lesPacks,$pack);
        }
        return $lesPacks;
    }

    public function getPackById($id){



        //$tabfect = reponse->fetch()
        //$this->marque = $tabfect["marque"];

        return $this;
    }


    public function newPack($nmarque,$model){

        $requete = $GLOBALS['bdd']->prepare('INSERT INTO `pcloc` (`Marque`, `Model`) VALUES ("'.$_POST["nom"].'","'.$_POST.'")');
        $requete->execute(array($this->Marque, $this->Model));

        if ($requete->rowCount()>0){

            return true;
        }else{
            return false;
        }

    }
    }
