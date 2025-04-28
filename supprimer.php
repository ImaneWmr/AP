<?php
session_start();
include '_conf.php';
$connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);

// Vérifie si le numéro de l'élève est passé dans le formulaire
if (isset($_POST['numEleve'])) {
    // Récupère le numéro de l'élève
    $numEleve = $_POST['numEleve'];

    // Connexion à la base de données (assure-toi que $connexion est initialisée)
    $requete = "DELETE FROM `utilisateur` WHERE `num` = $numEleve";
    $resultat = mysqli_query($connexion, $requete);

    // Vérifier si la suppression a réussi
    if ($resultat) {
        echo "L'élève a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'élève : " . mysqli_error($connexion);
    }
}

// Fermer la connexion à la base de données
mysqli_close($connexion);
?>


