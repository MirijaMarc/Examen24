<?php
include("../inc/fonctions.php");
session_start();

if (isset($_POST['status'])){   // Login
    if ($_POST['status']==1){
        if (isAdmin(getConnection(),$_POST['email'],$_POST['mdp'])!=-1){
            $_SESSION['id']=isAdmin(getConnection(),$_POST['email'],$_POST['mdp']);
            header('Location:../pages/admin.php');
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

if (isset($_GET['sup'])){
    deleteHabitation(getConnection(),$_GET['sup']);
    //header('Location:../pages/admin.php');
}

if (isset($_GET['depart'])){
    echo $_GET['depart'];
    echo $_GET['arrivee'];

    if (isDisponible(getConnection(),$_GET['idhabitation'],$_GET['arrivee'],$_GET['depart'])){
        InsertIntoReservation(getConnection(),$_GET['idhabitation'],$_GET['arrivee'],$_GET['depart']);
        header('Location:../pages/accueil.php');
    }else{
        echo $_GET['idhabitation'];
        header("Location:../pages/habitation.php?erreurRes=1&&idhabitation=".$_GET['idhabitation']);
    }
}

$date = '2022-12-27';
$date1 = '2022-12-30';

if ($date<$date1){
    echo "mety";
}
echo "gg";





?>