<?php
require_once ("connectiom.php");
function getAllClients(){
$clients=array();

 for ($i=0; $i < 10 ; $i++) { 
    #
    $clients[$i]['email']=$i->email;
    $clients[$i]['nom']=$i->nom;
    $clients[$i]['numero']=$i->numero;
 
 }
 return $clients;

}
function chekingpassword($pasword1,$pasword2){
  if (strcmp($pasword1,$pasword2)==1) {
    return true;
    }
    return false;
}
function getAllhabitation($habitation,$log1,$log2,$log3){
 $habitation =array($log1,$log2,$log3);

return $habitation;
}
?>