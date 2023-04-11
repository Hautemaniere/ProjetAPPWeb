<?php 
class Location {

private $id;

private $idClient;
private $idPack;

public function __construct($id,$idClient, $idPack){
   $this->id=$id;
   $this->idClient=$idClient;
   $this->idPack=$idPack;
}

public function setId($newId){
    $this->id=$newId;
}
public function getId(){
    return $this->id;
}
public function setClient($newClient){
    $this->idClient=$newClient;
}
public function getClient(){
    return $this->idClient;
}
public function setPack($newPack){
    $this->idPack=$newPack;
}
public function getPack(){
    return $this->idPack; 
}
public function getLocationAll(){
    $tabLocation=array();
    $req ="SELECT * FROM `location`";
    $resultat =  $GLOBALS["pdo"]->query($req);
    
    while ($tab = $resultat->fetch()) {
        $Location = new Location($tab['id'], $tab['idClient'],$tab['$idPack'] );
        array_push($tabLocation, $Location);
    }
    
    return $tabLocation;
} 
    //$tab['id'], $tab['idClient'],$tab['$idPack'] 
    //tabLocations[]
    //select *
    //foreache ->fetche all
    //pour chaque fetch tu creer un new Location setID set Client set loc 
    //array_push(tabLocations,new Location)

    //:return tabLocations[]
public function getLocationByid($id){

}

//getlocationALL

//getLocationByID($id)

//newLocation(qsd,qsdq,qsd,qsd,){ INSERT }


}
