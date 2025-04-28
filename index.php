<?php
session_start();
include '_conf.php';
if ($bdd=mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD)){
    
    echo "<br>";
}else {
    echo"erreur";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="general.css"> 
</head>
<form action="accueil.php" method="post" class="formConnexion">
<br>
    <h1> PAGE DE CONNEXION</h1>
   <label>Login :</label>
   <input name="login" id="login" type="text" required/>
  <br>
   <label>Mot de passe :</label>
   <input name="motDePasse" id="motDePasse" type="password" required/>
   <br>
   <button name = "send_con"type="submit" >Confirmer</button>
   <a href="oubli.php" > Mdp oublié </a >
  
   
</form>
</html>

