<?php
require_once("connexion.php");

// function deleteHabitation($connexion,$idHabitation){
    
// }

function getAllDateReservation($connexion, $idHabitation){
    $rep= array();
    $sql = sprintf("SELECT * FROM reservation where idhabitation='%s'",$idHabitation);
    
    $result = $connexion->query($sql);
    $result->setFetchMode(PDO::FETCH_OBJ);
    $i=0;
    while ($ligne = $result->fetch()) {
       $rep[$i]['start']= $ligne->arrive;
       $rep[$i]['end']= $ligne->depart;
       $rep[$i]['overlap']=false;
       $rep[$i]['display']= 'background';
       $rep[$i]['color']='#ff9f89';
       $i++;
    }
    $result->closeCursor();
    return $rep;
}

function InsertIntoReservation($connexion,$idHabitation, $arriver,$depart){
    $sql= sprintf("INSERT INTO reservation values (nextval('reservationseq'),'%s','%s','%s')",$idHabitation,$arriver,$depart);
    echo $sql;
    $connexion->exec($sql);
}

function isDisponible($connexion,$idHabitation, $arriver,$depart){
    $reservation = getAllReservationOfOneAbitation($connexion,$idHabitation);
    foreach ($reservation as $element){
        if ($arriver<$element['arrive']){
            if ($depart<$element['arrive']) return true;
            else return false;
        }else if ($arriver>$element['arrive']){
            if ($arriver>$element['depart']) return true;
            else return false;
        }
        
    }
    return false;
}

function getAllReservationOfOneAbitation($connexion, $idHabitation){
    $reservation=array();
    $req= sprintf("SELECT * FROM reservation where idhabitation='%s'",$idHabitation);

     $result = $connexion->query($req);
     $result->setFetchMode(PDO::FETCH_OBJ);
     $i=0;
     while ($ligne = $result->fetch()) {
        $reservation[$i]['idreservation']= $ligne->idreservation;
        $reservation[$i]['idhabitation']= $ligne->idhabitation;
        $reservation[$i]['arrive']= $ligne->arrive;
        $reservation[$i]['depart']= $ligne->depart;
        $i++;
     }
     $result->closeCursor();
     return $reservation;
}


function getAdmin($connexion){
    $admin=array();
    $req= sprintf("SELECT * FROM admin");
     $result = $connexion->query($req);
     $result->setFetchMode(PDO::FETCH_OBJ);
     $i=0;
     while ($ligne = $result->fetch()) {
        $admin[$i]['idadmin']= $ligne->idadmin;
        $admin[$i]['nom']= $ligne->nom;
        $admin[$i]['email']= $ligne->email;
        $admin[$i]['mdp']= $ligne->mdp;
        $admin[$i]['numtel']= $ligne->numtel;
        $i++;
     }
     $result->closeCursor();
     return $admin;
}

function getAllClients($connexion){
    $clients=array();
    $req= sprintf("SELECT * FROM client");
     $result = $connexion->query($req);
     $result->setFetchMode(PDO::FETCH_OBJ);
     $i=0;
     while ($ligne = $result->fetch()) {
        $client[$i]['idclient']= $ligne->idclient;
        $client[$i]['nom']= $ligne->nom;
        $client[$i]['email']= $ligne->email;
        $client[$i]['mdp']= $ligne->mdp;
        $client[$i]['numtel']= $ligne->numtel;
        $i++;
     }
     $result->closeCursor();
     return $client;

}

function isAdmin($connexion, $email,$mdp){
    $admin = getAdmin($connexion);
    for ($i=0 ; $i<count($admin); $i++) {
        if (strcmp($admin[$i]['email'],$email)==0 && strcmp($admin[$i]['mdp'],$mdp)==0) {
          return $admin[$i]['idadmin'];
        }
    }
    return -1;
}

function isMember($connexion,$email,$mdp){
    $clients = getAllClients($connexion);
    for ($i=0; $i< count($clients) ; $i++) {
        if(strcmp($clients[$i]['email'],$email)==0 && strcmp($clients[$i]['mdp'],$mdp)==0){
            return $clients[$i]['idclient'];
        }
    }
    return -1;
}

function chekingpassword($pasword1,$pasword2){
  if (strcmp($pasword1,$pasword2)==0) return true;
    return false;
}

function getAllPicsOfOneHabitation($connexion,$idHabitation){
    $pics=array();
    $req= sprintf("SELECT p.nom from pics as p
                    JOIN Pics_Habitation as ph ON p.idPics= ph.idPics
                    JOIN Habitation as h ON ph.idHabitation = h.idHabitation
                    where ph.idHabitation='%s'",$idHabitation);
    $result = $connexion->query($req);
    $result->setFetchMode(PDO::FETCH_OBJ);
    $i=0;
    while ($ligne = $result->fetch()) {
        $pics[$i]['nom']= $ligne->nom;
        $i++;
     }
     $result->closeCursor();
     return $pics;
}

function getAllhabitation($connexion){
    $habit=array();
    $req= sprintf("SELECT * FROM habitation ");
     $result = $connexion->query($req);
     $result->setFetchMode(PDO::FETCH_OBJ);
     $i=0;
     while ($ligne = $result->fetch()) {
        $habit[$i]['idhabitation']= $ligne->idhabitation;
        $habit[$i]['idtypeh']= $ligne->idtypeh;
        $habit[$i]['nbrchambre']= $ligne->nbrchambre;
        $habit[$i]['loyer']= $ligne->loyer;
        $habit[$i]['idquartier']= $ligne->idquartier;
        $i++;
     }
     $result->closeCursor();
     return $habit;
}

function getDetailOneHabitation($connexion,$idHabitation){
    $detail=array();
    $req= sprintf("SELECT h.idhabitation,q.quartier,th.typeHabitation,h.nbrChambre,h.descriptionH,h.loyer  from Habitation as h
                        JOIN typeH as th ON th.idTypeH= h.idTypeH
                        JOIN quartier as q ON q.idQuartier= h.idQuartier
                        Where h.idHabitation='%s'",$idHabitation);
     $result = $connexion->query($req);
     $result->setFetchMode(PDO::FETCH_OBJ);
     while ($ligne = $result->fetch()) {
        $detail['idhabitation']= $ligne->idhabitation;
        $detail['quartier']= $ligne->quartier;
        $detail['typehabitation']= $ligne->typehabitation;
        $detail['nbrchambre']= $ligne->nbrchambre;
        $detail['descriptionh']= $ligne->descriptionh;
        $detail['loyer']= $ligne->loyer;
     }
     $result->closeCursor();
     return $detail;
}

function insertToClient($connexion,$nom,$email,$mdp,$num){
    $sql = sprintf("INSERT INTO Client VALUES(nextval('clientseq'),'%s','%s','%s','%s')",$nom,$email,$mdp,$num);
    echo $sql;
    $connexion->exec($sql);
}

function getHabitationResearch($connexion, $string){
    $habit=array();
    $req= sprintf("SELECT * from habitation where descriptionh like '%s%s%s'","%",$string,"%");
    // echo $req;
     $result = $connexion->query($req);
     $result->setFetchMode(PDO::FETCH_OBJ);
     $i =0;
     while ($ligne = $result->fetch()) {
        $habit[$i]['idhabitation']= $ligne->idhabitation;
        $habit[$i]['idtypeh']= $ligne->idtypeh;
        $habit[$i]['nbrchambre']= $ligne->nbrchambre;
        $habit[$i]['loyer']= $ligne->loyer;
        $habit[$i]['idquartier']= $ligne->idquartier;
        $i++;
     }
     $result->closeCursor();
     return $habit;
}

// function insertToHabitation($connexion,$type,$chambre,$loyer,$quartier,$description){
//   $sql = "INSERT INTO Habitation VALUES(nextval('habitationseq'),%s,%g,%g,%s,%s)";
  
//   $sql = sprintf("$sql,$type,$chambre,$loyer,$quartier,$description");
//   $connexion->exec($sql);
// }
  

?>