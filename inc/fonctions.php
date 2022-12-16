<?php
require_once("connexion.php");

function getAdmin($connexion){
    $admin=array();

    for ($i=0; $i< $admin.length; $i++ ) {
      $admin[$i]['nom']=$i->nom;
      $admin[$i]['email']=$i->email;
      $admin[$i]['numTel']=$i->numTel;
    }

    return $admin;
}

function getAllClients($connexion){
    $clients=array();

    for ($i=0; $i < 10 ; $i++) { 
        $clients[$i]['email']=$i->email;
        $clients[$i]['nom']=$i->nom;
        $clients[$i]['numTel']=$i->numTel;
    
    }
    return $clients;

}

function isAdmin($connexion, $email,$mdp){
    $admin = array();
    for ($i=0 ; $i<$admin; $i++) {
        if (strcmp($admin[$i]['email'],$email) && strcmp($admin[$i]['mdp'],$mdp)) {
          return true;
        }
    }
    return false;
}

function isMember($connexion,$email,$mdp){
    $clients = array();
    for ($i=0; $i< $clients.length ; $i++) {
        if(strcmp($client[$i]['email'],$email) && strcmp($client[$i]['mdp'],$mdp)){
            return true;
        }
    }
    return false;
}

function chekingpassword($pasword1,$pasword2){
  if (strcmp($pasword1,$pasword2)==true) return true;
    return false;
}

function getAllhabitation($habitation,$log1,$log2,$log3){
 $habitation =array($log1,$log2,$log3);

return $habitation;
}

function insertToClient($connexion,$nom,$email,$mdp,$num){
    $sql = "INSERT INTO Client VALUES(nextval('clientseq'),%s,%s,%s,%S)";
    $sql = sprintf("$sql,$nom,$email,$mdp,$num");

    $connexion->exec($sql);
}

function insertToHabitation($connexion,$type,$chambre,$loyer,$quartier,$description){
  $sql = "INSERT INTO Habitation VALUES(nextval('habitationseq'),%s,%g,%g,%s,%s)";
  $sql = sprintf("$sql,$type,$chambre,$loyer,$quartier,$description");

  $connexion->exec($sql);
}
  

?>