<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="general.css"> 
    <body>
    <br><br>
    <br><br>
    </body>
</html>
<?php
session_start();
include '_conf.php';
include 'fonctions.php';
// si c'est un prof :
$connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);

if($_SESSION['numType']==2){
    if (isset($_GET['num']) && isset($_GET['prof'])) {
        echo "
        <div class='form-container'>
            <h2>Laisser un Commentaire</h2>
            <form action='' method='post'>
                <label for='commentaire'>Votre commentaire :</label>
                <textarea id='commentaire' name='commentaire' rows='4' placeholder='Entrez votre commentaire ici...'></textarea>
                <button type='submit'>Envoyer</button>
            </form>
        </div>
        ";
    
        // Vérifiez si le formulaire a été soumis avant d'accéder à $_POST['commentaire']
        if (isset($_POST['commentaire'])) {
            // Récupérer le commentaire soumis
            $commentaire = $_POST['commentaire'];
            
            // Si le commentaire est vide, vous pouvez gérer l'erreur ici
            if (empty($commentaire)) {
                echo "Le commentaire ne peut pas être vide.";
            } else {
                // Insérer le commentaire dans la base de données
                $date1 = getCreationDate();
                $numcr = $_GET['num'];    // Récupère la valeur de 'num' passée dans l'URL
                $numProf = $_GET['prof'];
    
                // Préparer la requête d'insertion
                $requete = "INSERT INTO `commentaire` (`commentaire`, `dateT`, `numProf`, `numCR`) 
                            VALUES ('$commentaire', '$date1', '$numProf', '$numcr')";
                $resultat = mysqli_query($connexion, $requete);
    
                if ($resultat) {
                    echo "Commentaire ajouté avec succès.";
                } else {
                    echo "Une erreur est survenue lors de l'ajout du commentaire.";
                }
            }
        }
    }
}elseif($_SESSION['numType']==1){
    $requete1 = "SELECT commentaire FROM `commentaire`";
    $resultat1 = mysqli_query($connexion, $requete1);
    while ($donnees = mysqli_fetch_assoc($resultat1)) {
        echo "<div class='commentaire'>";
        echo "<p><strong>Commentaire:</strong> " . htmlspecialchars($donnees['commentaire']) . "</p>";
         
         echo"<br>";
         echo"</div>";
    }
    
}
include 'menu.php';
?>

