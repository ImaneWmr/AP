<div class="container">
<?php
session_start();
include '_conf.php';

$connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);

if (isset($_GET['num'])) {
    $numcr = $_GET['num'];
} else {
    die("Numéro de compte rendu non défini.");
}

    
$requete2 = "SELECT description FROM `cr` WHERE `num` = '$numcr'";
$resultat2 = mysqli_query($connexion, $requete2);


if ($resultat2 && mysqli_num_rows($resultat2) > 0) {
    
    $ligne = mysqli_fetch_assoc($resultat2);
    
} else {
    echo "Aucune description trouvée.";
}

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="general.css"> 
</head>

<form method="post">
<br><br>
<br><br>
<br><br>
        <label for="date">Date :</label>
        <input type="date" id="datee" name="datee" >
        <br><br>

        <label for="description">Description :
           
        </label>
        <textarea id="description" name="description" rows="4" cols="50" required>
        <?php  echo htmlspecialchars($ligne['description']);?>
        </textarea>
        <br><br>
        <button type='submit' name='confirm'>confirmer</button>
</form>
<?php

include '_conf.php';
$connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
//$numcr=$_GET['num'];

if(isset($_POST['confirm'])){

        $datee = $_POST['datee']; 
        $description = $_POST['description']; 

        $requete1="UPDATE `cr` SET `date` = '$datee', `description` = '$description' WHERE `num` = '$numcr'";
        $resultat1 = mysqli_query($connexion, $requete1);
        if (mysqli_query($connexion, $requete1)) {
            echo "Modification réussie.";
            header("Location: liste_compte_rendu.php"); 
        } else {
            echo "Erreur lors de la modification : " . mysqli_error($connexion);
        }
}
include 'menu.php';
?>
