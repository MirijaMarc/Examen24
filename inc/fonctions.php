<?php
require_once("connexion.php");

function getAdmin($connexion){
    $admin=array();
    return $admin;
}

function getAllClients($connexion){
    $clients=array();

    for ($i=0; $i < 10 ; $i++) { 
        $clients[$i]['email']=$i->email;
        $clients[$i]['nom']=$i->nom;
        $clients[$i]['numero']=$i->numero;
    
    }
    return $clients;

}

function isAdmin($connexion, $email,$mdp){
    return true;
}

function isMember($connexion,$email, $mdp){
    return true;
}

function chekingpassword($pasword1,$pasword2){
  if (strcmp($pasword1,$pasword2)==true) return true;
    return false;
}

function getAllhabitation($habitation,$log1,$log2,$log3){
 $habitation =array($log1,$log2,$log3);

return $habitation;
}
?>