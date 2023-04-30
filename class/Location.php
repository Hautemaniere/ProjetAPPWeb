<?php
class Location
{

    private $id;
    private $idClient;
    private $idPack;

    public function __construct($id, $idClient, $idPack)
    {
        $this->id = $id;
        $this->idClient = $idClient;
        $this->idPack = $idPack;
    }

    public function setId($newId)
    {
        $this->id = $newId;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setClient($newClient)
    {
        $this->idClient = $newClient;
    }
    public function getClient()
    {
        return $this->idClient;
    }
    public function setPack($newPack)
    {
        $this->idPack = $newPack;
    }
    public function getPack()
    {
        return $this->idPack;
    }
    public function getLocationAll()
    {
        $tabLocation = array();
        $req = "SELECT * FROM `location`";
        $resultat =  $GLOBALS["pdo"]->query($req);

        while ($tab = $resultat->fetch()) {
            $Location = new Location($tab['id'], $tab['idClient'], $tab['$idPack']);
            array_push($tabLocation, $Location);
        }

        return $tabLocation;
    }
    
    public function getLocationByid($id)
    {
        $requete = "SELECT id FROM `location`";
        $resultat2 =  $GLOBALS["pdo"]->query($requete);
        if ($resultat2->rowCount() > 0) {
            $tab = $resultat2->fetch();
            $this->id = $tab['id'];
        }
    }
    public function newLocation($idclient, $idpcloc, $dateheure)
    {
        $req = 'INSERT INTO `location`( `idclient`, `idpcloc`, `dateheure`) VALUES ("' . $idclient . '","' . $idpcloc . '","' . $dateheure . '")';
        //echo $req;
        $requete2 = $GLOBALS['pdo']->query($req);
        if ($requete2 && $requete2->rowCount() > 0) {
            return $GLOBALS['pdo']->lastInsertID();
        } else {
            return 0;
        }
    }
}
