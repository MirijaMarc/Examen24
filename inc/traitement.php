<?php
include("../inc/fonctions.php");
session_start();

if (isset($_POST['status'])){   // Login
    if ($_POST['status']==1){
        if (isAdmin(getConnection(),$_POST['email'],$_POST['mdp'])!=-1){
            $_SESSION['id']=isAdmin(getConnection(),$_POST['email'],$_POST['mdp']);
            header('Location:../pages/controleur.php');
        }else{
            header('Location:../login.php?status=1');
        }
    
    }else if ($_POST['status']==0){
        //var_dump(getAllClients(getConnection()));
        if (isMember(getConnection(),$_POST['email'],$_POST['mdp'])!=-1){
            $_SESSION['id']=isMember(getConnection(),$_POST['email'],$_POST['mdp']);
            echo isMember(getConnection(),$_POST['email'],$_POST['mdp']);
            header('Location:../pages/accueil.php');
        }else{
            header('Location:../pages/login.php?status=0');
        }
    }
}

if (isset($_POST['inscrimdp2'])){
    if (chekingpassword($_POST['inscrimdp2'],$_POST['inscrimdp1'])){
        insertToClient(getConnection(),$_POST['name'],$_POST['email'],$_POST['inscrimdp2'],$_POST['phone']);
        $_SESSION['id']=isMember(getConnection(),$_POST['email'],$_POST['inscrimdp2']);
        header('Location:../pages/accueil.php');
    }else{
        header('Location:../pages/inscription.php?checking=1');
    }
}

if(isset($_GET['research'])){
    header("Location:../pages/recherche.php?string=".$_GET['research']);
}




?>