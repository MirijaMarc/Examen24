<?php
$status = $_GET['status'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/src/style.css">
</head>
<body>
    <div class="content_login">
      <span><img src="../assets/img/logoLogin.jpg" id="logoLog"></span> 
      <div>
         <form action="../inc/traitement.php" method="post">
            <li><input type="text" name="email" placeholder="Email..." required ></li>
            <li><input type="text" name="mdp" placeholder="Mot de Passe..." required></li>
            <li><input type="submit" value="Se connecter"></li>
            <input type="hidden" name= "status"value="<?php echo $status; ?>">
            <li><a href="inscription.php">S'inscrire</a></li>
         </form>
      </div>

    </div>



    
</body>
</html>