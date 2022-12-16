<?php
require_once("../inc/connexion.php");
include ("../inc/fonctions.php");

$detail = getDetailOneHabitation(getConnection(),$_GET['idhabitation']);
$allpics= getAllPicsOfOneHabitation(getConnection(), $_GET['idhabitation']); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitation</title>
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

    <div class="content_habitation">
        <span><?php echo $detail['typehabitation']; ?> avec <?php echo $detail['nbrchambre'];?> Chambres situés à <?php echo $detail['quartier']; ?></span>
        <div class="album">
            <div class="album_cover">
            <img src="../assets/img/Pictures/<?php echo $_GET['idhabitation']; ?>/<?php echo $allpics[0]['nom']; ?>.png" alt="image">
            </div>
            <div class="album4">
                <?php for ($i=1; $i < count($allpics) ; $i++) { ?>
                    <div> <img src="../assets/img/Pictures/<?php echo $_GET['idhabitation']; ?>/<?php echo $allpics[$i]['nom']; ?>.png" alt="image"></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="description">
        <span>Description</span>
        <span>
            <?php echo $detail['descriptionh']; ?>
        </span>
    </div>

    <div class="prix">
        Loyer: <span><?php echo $detail['loyer'];  ?>$ </span>
    </div>

    <hr>

    <div class="reservation">
        <form action="../inc/traitement.php" method="get">
            <div>
                <div>
                    <span>Arrivee</span>
                    <span><input type="date" name="arrivee"></span>
                    <span><input type="hidden" name ="idhabitation" value=<?php echo $_GET['idhabitation']; ?>></span>
                </div>

                <div>
                    <span>Depart</span>
                    <span><input type="date" name="depart"></span>
                </div>
            </div>
            <div>
                <input type="submit" value="Reserver">
            </div>
        </form>
        
    </div>

    <div class="occupation">
        <a href="calendrier.php?idhabitation=<?php echo $_GET['idhabitation'];?>">Occupation de l' habitat</a>
    </div>
    <?php
        if(isset($_GET['erreurRes'])){ ?>
            <span id="errorRes">Reservation Impossible</span>
    <?php }?>

    
</body>
</html>