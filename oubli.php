
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="general.css"> 

    <title>Récupération de mot de passe</title>
</head>
<body>
<button onclick='history.back()'>Retour</button>
<form method="post" class ="formemail">
    <label for="mail">Saisir @ email :</label>
    <input name="email" id="mail" type="email" required />

    <button type="submit" name="btnemail">Confirmer</button>
</form>

<?php

include '_conf.php'; // Inclusion du fichier de configuration

// Vérifier si le formulaire a été soumis
if (isset($_POST['email'])) {
    $lemail = $_POST['email'];

    // Connexion à la base de données
    $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
    
    if ($connexion) {
        //echo "Connexion réussie! <br>";

        // Préparation de la requête en échappant correctement l'email
        $lemail = mysqli_real_escape_string($connexion, $lemail);
        $requete = "SELECT * FROM `utilisateur` WHERE email = '$lemail'";

        // Exécution de la requête
        $resultat = mysqli_query($connexion, $requete);

        if (mysqli_num_rows($resultat) > 0) {
            while ($donnees = mysqli_fetch_assoc($resultat)) {
                $mdp = $donnees['motdepasse'];
                // generer un mdp 
                $mdp1 = uniqid();
                
                $mdp2= md5($mdp1);
                mail($lemail, 'Mot de passe oublie ?', 'Voici votre mot de passe : '.$mdp1);
                
                echo "<br>";
                echo "Le formulaire a été envoyé avec comme email la valeur : " . htmlspecialchars($lemail);
                $requete2= "UPDATE `utilisateur` 
                            SET motdepasse = '$mdp2'
                            where email='$lemail'  ;";
                            
                if(!mysqli_query($connexion, $requete2))
                       echo "<br> Erreur:".mysqli_error($connexion)."<br>";

            }
        } else {
            echo "L'email n'existe pas";
        }
    } else {
        echo "Erreur de connexion à la base de données";
    }

   


    // Fermer la connexion
    mysqli_close($connexion);
}
include 'menu.php';
?>