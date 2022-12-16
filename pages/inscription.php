<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="../assets/src/style.css">
</head>
<body>
    <div class="content_inscri">
        <div class="partieGauche">
            <span>Want to Join Us?</span>
        </div>
        <div class="partieDroite">
            <form action="../inc/traitement.php" method="post">
                <li><input type="text" name="name" placeholder="Your name" required></li>
                <li><input type="text" name="email" placeholder="Email Address" required></li>
                <li><input type="text" name="phone" placeholder="Phone Number" required></li>
                <li><input type="password" name="inscrimdp1" placeholder="Your Password" required></li>
                <li><input type="password" name="inscrimdp2" placeholder="Confirm Your Passsord" required></li>
                <li><input type="submit" value="Valider"></li>
                <?php if(isset($_GET['checking'])){ ?>
                    <span id="error"> - - Mot de Passe Incorrect</span>
                <?php } ?>
            </form>
        </div>
    </div>
    
</body>
</html>