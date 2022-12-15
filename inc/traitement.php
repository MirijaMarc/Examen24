<?php
include("../inc/fonctions.php");
session_start;

if ($_POST['status']==1){
    if (isAdmin(getConnection(),$_GET['email'],$_GET['mdp'])){
        $_SESSION['id']=1;
        header('Location:../pages/controleur.php');
    }else{
        header('Location:../login.php?status=1');
    }

}else if ($_POST['status']==0){
    if (isMember(getConnection(),$_GET['email'],$_GET['mdp'])){
        $_SESSION['id']=1;
        header('Location:../pages/accueil.php');
    }else{
        header('Location:../login.php?status=0');
    }
}

?>