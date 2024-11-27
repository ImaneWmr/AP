<?php
 session_start();
 include 'fonctions.php';
// si c'est un éleve on insère le compte rendu
     if(isset($_POST['send_new'])){
    
        
        include '_conf.php';
        $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
        
        $datee = $_POST['datee']; 
        $description = $_POST['description']; 
        $datecreation = getCreationDate(); 
        $datemodification = getModificationDate();
        //$vu = $_POST['vu']; // Champ Vu (Oui/Non)
        
        $requete = "INSERT INTO `cr`(`num`, `date`, `description`, `datecreation`, `datemodification`, `vu`, `numEleve`) 
        VALUES ('','$datee','$description','$datecreation','$datemodification','','" . $_SESSION['num'] . "')";
        echo "compte rendu enregistré";
        $resultat = mysqli_query($connexion, $requete);
     
    }
     ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css"> 
</head>
    <title>Formulaire</title>
</head>
<body>
    
    
    <form action="creer_compte_rendu.php" method="post">
        <!-- Champ Date -->
        <h1>CREATION DE COMPTE RENDU</h1>
        <label for="date">Date :</label>
        <input type="date" id="datee" name="datee" required>
        <br><br>
        
        <!-- Champ Description -->
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        <br><br>
        
        <!-- Champ Date de création <label for="datecreation">Date de création :</label>
        <input type="datetime-local" id="datecreation" name="datecreation" required>
        <br><br>
        
    
        <label for="datemodification">Date de modification :</label>
        <input type="datetime-local" id="datemodification" name="datemodification">
        <br><br>-->
        
        
        <!-- Champ Vu :
          <label for="vu">Vu :</label>
        <select id="vu" name="vu">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
        <br><br>
        -->
       
        
        <!-- Champ Numéro Élève 
         <label for="numEleve">Numéro Élève :</label>
        <input type="number" id="numEleve" name="numEleve" min="1" required>
        <br><br>
         -->
        
        
        <!-- Bouton Soumettre -->
        <button type="submit" name="send_new">Envoyer</button>
    </form>
</body>
</html>
    
