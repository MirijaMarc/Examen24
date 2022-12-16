<?php
require_once("../inc/connexion.php");
include ("../inc/fonctions.php");
$habitations =getAllhabitation(getConnection());
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../assets/src/style.css">
    <link rel="stylesheet" href="../assets/src/fontawesome-5/css/all.css">
</head>
<body>
    <header>
        <div class="banniere">
            <span><a href="accueil.php"><i class="fas fa-home"></i></a></span>
            <span>
                <form action="../inc/traitement.php" method="get">
                    <input type="submit" value="Search">
                    <input type="text" name="research">
                </form>
            </span>
            <span><a href="../inc/deconnexion.php">Se deconnecter</a></span>
        </div>
    </header>    

    <div class="content_accueil">
        <?php
            foreach($habitations as $habit){
                $allpics= getAllPicsOfOneHabitation(getConnection(), $habit['idhabitation']); ?>
                <div class="habitation">
                    <div class="habitation_img">
                    <a href="habitation.php?idhabitation=<?php echo $habit['idhabitation']; ?>"><img src="../assets/img/Pictures/<?php echo $habit['idhabitation']; ?>/<?php echo $allpics[0]['nom']; ?>.png" alt="image"></a>
                    </div>
                    <div class="habitation_description">
                        <?php echo $habit['loyer'] ?>$ 
                    </div>
                </div>
            
            <?php  } ?>
    
    </div>


</body>
</html>