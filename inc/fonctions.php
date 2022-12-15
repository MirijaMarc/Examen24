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

?>

